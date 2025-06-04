<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AutorService;
use Illuminate\Routing\Controller;
use App\Http\Resources\AutorResource;
use App\Http\Resources\LivroResource;
use App\Http\Requests\AutorStoreRequest;
use App\Http\Requests\AutorUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AutorController extends Controller
{
    private AutorService $autorService;
    public function __construct(AutorService $autorService)
    {
        $this->autorService = $autorService;
    }

    public function store(AutorStoreRequest $request)
    {
        $data = $request->validated();
        $autor = $this->autorService->store($data);
        return new AutorResource($autor);

    }

    public function get()
    {
        $autores = $this->autorService->get();
        return AutorResource::collection($autores);
    }

    public function details($id){
        try{
            $autor = $this->autorService->details($id);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['erro'=>'autores not found', 404]);

        }
        return new AutorResource($autor);
    }

    public function update(int $id, AutorUpdateRequest $request){
        $data = $request->validated();
        try{
            $autor = $this->autorService->update($id, $data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'autores not found', 404]);
        }
        return new AutorResource($autor);
    }
    public function delete(int $id){
        try{
            $autor = $this->autorService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'autores not found', 404]);
        }
        return new AutorResource($autor);
    }

    public function getWithLivros(){
        $autores = $this->autorService->getWithLivros();
        return AutorResource::collection($autores);
    }

    public function findLivros(int $id){
        try{
            $livros = $this->autorService->findLivros($id);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'autores not found', 404]);
        }
        return LivroResource::collection($livros);
    }
}
