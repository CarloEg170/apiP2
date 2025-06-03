<?php

namespace App\Services;

use App\Services\ReviewService;
use App\Repositories\LivroRepository;
use App\Repositories\ReviewRepository;

class LivroService

{
    private LivroRepository $livroRepository;
    private ReviewService $reviewService;
    private ReviewRepository $reviewRepository;

    public function __construct(LivroRepository $livroRepository, ReviewService $reviewService, ReviewRepository $reviewRepository)
    {
        $this->livroRepository = $livroRepository;
        $this->reviewService = $reviewService;
        $this->reviewRepository = $reviewRepository;
    }

    public function store(array $data)
    {
        return $this->livroRepository->store($data);
    }

        public function get(){
        $livros = $this->livroRepository->get();
        return $livros;
    }

    public function details($id){
        return $this->livroRepository->details($id);
    }

    public function update($id, $data){
        $livro = $this->livroRepository->update($id,$data);
        return $livro;

    }

    public function delete(int $id){
        $livro = $this->details($id);
        $reviews = $livro->reviews;

        foreach($reviews as $review){
            $this->reviewService->delete($review->id);
        }
        return $this->livroRepository->delete($id);
    }

    public function getWithReview(){
        return $this->livroRepository->getWithReview();
    }

    public function findReview(int $id){
        return $this->livroRepository->findReview($id);
    }
}
