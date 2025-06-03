<?php

namespace App\Services;

use App\Models\Review;
use App\Repositories\UsuarioRepository;


class UsuarioService

{
    private UsuarioRepository $usuarioRepository;
    private ReviewService $reviewService;

    public function __construct(UsuarioRepository $usuarioRepository, ReviewService $reviewService)
    {
        $this->usuarioRepository = $usuarioRepository;
        $this->reviewService = $reviewService;
    }

    public function store(array $data)
    {
        return $this->usuarioRepository->store($data);
    }

     public function get(){
        $usuarios = $this->usuarioRepository->get();
        return $usuarios;
    }

    public function details($id){
        return $this->usuarioRepository->details($id);
    }

    public function update($id, $data){
        $usuario = $this->usuarioRepository->update($id,$data);
        return $usuario;

    }

    public function delete(int $id){
        $usuario = $this->details($id);
        $reviews = $usuario->reviews;

        foreach($reviews as $review){
            $this->reviewService->delete($review->id);
        }
        return $this->usuarioRepository->delete($id);
    }

    public function getWithReviews(){
        return $this->usuarioRepository->getWithReviews();
    }

    public function findReviews(int $id){
        return $this->usuarioRepository->findReviews($id);
    }
}
