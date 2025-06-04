<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LivroService;
use Illuminate\Routing\Controller;
use App\Http\Resources\LivroResource;
use App\Http\Resources\ReviewResource;
use App\Http\Requests\LivroStoreRequest;
use App\Http\Requests\LivroUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LivroController extends Controller
{
    private LivroService $livroService;
    public function __construct(LivroService $livroService)
    {
        $this->livroService = $livroService;
    }

    public function store(LivroStoreRequest $request)
    {
        $data = $request->validated();
        $autor = $this->livroService->store($data);
        return new LivroResource($autor);

    }

      public function get()
    {
        $autores = $this->livroService->get();
        return LivroResource::collection($autores);
    }

    public function details($id){
        try{
            $livro = $this->livroService->details($id);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['erro'=>'livros not found', 404]);

        }
        return new LivroResource($livro);
    }

    public function update(int $id, LivroUpdateRequest $request){
        $data = $request->validated();
        try{
            $livro = $this->livroService->update($id, $data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'livros not found', 404]);
        }
        return new LivroResource($livro);
    }
    public function delete(int $id){
        try{
            $livro = $this->livroService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'livros not found', 404]);
        }
        return new LivroResource($livro);
    }

    public function getWithReview(){
        $livros = $this->livroService->getWithReview();
        return LivroResource::collection($livros);
    }

    public function findReview(int $id){
        try{
            $review = $this->livroService->findReview($id);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'livros not found', 404]);
        }
        return ReviewResource::collection($review);
    }
}
