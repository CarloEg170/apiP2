<?php

namespace App\Repositories;

use App\Models\livro;

class LivroRepository
{
    public function store(array $data){
        return livro::create($data);
    }

    public function get(){
        return Livro::all();
    }
    public function details(int $id){
        return Livro::findOrFail($id);
    }
    public function update(int $id, array $data){
        $livro = $this->details($id);
        $livro->update($data);
        return $livro;
    }

    public function delete(int $id){
        $livro = $this->details($id);
        $livro->delete();
        return $livro;
    }

    public function getWithReview(){
        $livros = Livro::with('review')->get();
        return $livros;
    }

    public function findReview(int $id){
        $livro = $this->details($id);
        return $livro->reviews;
    }
}
