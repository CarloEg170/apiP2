<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;
use App\Services\GeneroService;
use Illuminate\Routing\Controller;
use App\Http\Resources\GeneroResource;
use App\Http\Requests\GeneroStoreRequest;
use App\Http\Requests\GeneroUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GeneroController extends Controller
{
    private GeneroService $generoService;
    public function __construct(GeneroService $autorService)
    {
        $this->generoService = $autorService;
    }

    public function store(GeneroStoreRequest $request)
    {
        $data = $request->validated();
        $autor = $this->generoService->store($data);
        return new GeneroResource($autor);

    }

          public function get()
    {
        $autores = $this->generoService->get();
        return GeneroResource::collection($autores);
    }

    public function details($id){
        try{
            $genero = $this->generoService->details($id);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['erro'=>'generos not found', 404]);

        }
        return new GeneroResource($genero);
    }

    public function update(int $id, GeneroUpdateRequest $request){
        $data = $request->validated();
        try{
            $genero = $this->generoService->update($id, $data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'generos not found', 404]);
        }
        return new GeneroResource($genero);
    }
    public function delete(int $id){
        try{
            $genero = $this->generoService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'generos not found', 404]);
        }
        return new GeneroResource($genero);
    }

    public function getWithLivro(){
        $generos = $this->generoService->getWithLivros();
        return GeneroResource::collection($generos);
    }

    public function findLivros(int $id){
        try{
            $livro = $this->generoService->findLivros($id);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'generos not found', 404]);
        }
        return GeneroResource::collection($livro);
    }
}
