<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UsuarioService;
use Illuminate\Routing\Controller;
use App\Http\Resources\UsuarioResource;
use App\Http\Requests\UsuarioStoreRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsuarioController extends Controller
{
    private UsuarioService $usuarioService;
    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function store(UsuarioStoreRequest $request)
    {
        $data = $request->validated();
        $usuario = $this->usuarioService->store($data);
        return new UsuarioResource($usuario);

    }

    public function get()
    {
        $usuarios = $this->usuarioService->get();
        return UsuarioResource::collection($usuarios);
    }

    public function details($id){
        try{
            $usuario = $this->usuarioService->details($id);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['erro'=>'usuarios not found', 404]);

        }
        return new UsuarioResource($usuario);
    }

    public function update(int $id, UsuarioUpdateRequest $request){
        $data = $request->validated();
        try{
            $usuario = $this->usuarioService->update($id, $data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'usuarios not found', 404]);
        }
        return new UsuarioResource($usuario);
    }
    public function delete(int $id){
        try{
            $livro = $this->usuarioService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'usuarios not found', 404]);
        }
        return new UsuarioResource($livro);
    }

    public function getWithReviews(){
        $usuario = $this->usuarioService->getWithReviews();
        return UsuarioResource::collection($usuario);
    }

    public function findReviews(int $id){
        try{
            $review = $this->usuarioService->findReviews($id);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'usuarios not found', 404]);
        }
        return UsuarioResource::collection($review);
    }
}
