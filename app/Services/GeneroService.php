<?php

namespace App\Services;

use App\Services\LivroService;
use App\Repositories\LivroRepository;
use App\Repositories\GeneroRepository;


class GeneroService

{
    private GeneroRepository $generoRepository;
    private LivroService $livroService;
    private LivroRepository $livroRepository;

    public function __construct(GeneroRepository $generoRepository, LivroService $livroService, LivroRepository $livroRepository)
    {
        $this->generoRepository = $generoRepository;
    }

    public function store(array $data)
    {
        return $this->generoRepository->store($data);
    }

        public function get(){
        $generos = $this->generoRepository->get();
        return $generos;
    }

    public function details($id){
        return $this->generoRepository->details($id);
    }

    public function update($id, $data){
        $autor = $this->generoRepository->update($id,$data);
        return $autor;

    }

    public function delete(int $id){
        $autor = $this->details($id);
        $livros = $autor->livros;

        foreach($livros as $livro){
            $this->livroService->delete($livro->id);
        }
        return $this->generoRepository->delete($id);
    }

    public function getWithLivros(){
        return $this->generoRepository->getWithLivros();
    }

    public function findLivros(int $id){
        return $this->generoRepository->findLivros($id);
    }
}
