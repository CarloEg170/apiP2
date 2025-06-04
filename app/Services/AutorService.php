<?php

namespace App\Services;

use App\Services\LivroService;
use App\Repositories\AutorRepository;
use App\Repositories\LivroRepository;

class AutorService

{
    private AutorRepository $autorRepository;
    private LivroService $livroService;
    private LivroRepository $livroRepository;

    public function __construct(AutorRepository $autorRepository, LivroService $livroService, LivroRepository $livroRepository)
    {
        $this-> livroService = $livroService;
        $this->autorRepository = $autorRepository;
        $this->livroRepository = $livroRepository;
    }

    public function store(array $data)
    {
        return $this->autorRepository->store($data);
    }

    public function get(){
        $autores = $this->autorRepository->get();
        return $autores;
    }

    public function details($id){
        return $this->autorRepository->details($id);
    }

    public function update($id, $data){
        $autor = $this->autorRepository->update($id,$data);
        return $autor;

    }

    public function delete(int $id){
        $autor = $this->details($id);
        $livros = $autor->livros;

        foreach($livros as $livro){
            $this->livroService->delete($livro->id);
        }
        return $this->autorRepository->delete($id);
    }

    public function getWithLivros(){
        return $this->autorRepository->getWithLivros();
    }

    public function findLivros(int $id){
        return $this->autorRepository->findLivros($id);
    }
}
