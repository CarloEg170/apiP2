<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReviewService;
use Illuminate\Routing\Controller;
use App\Http\Resources\ReviewResource;
use App\Http\Requests\LivroStoreRequest;
use App\Http\Requests\ReviewUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReviewController extends Controller
{
    private ReviewService $reviewService;
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function store(LivroStoreRequest $request)
    {
        $data = $request->validated();
        $review = $this->reviewService->store($data);
        return new ReviewResource($review);

    }

          public function get()
    {
        $reviews = $this->reviewService->get();
        return ReviewResource::collection($reviews);
    }

    public function details($id){
        try{
            $review = $this->reviewService->details($id);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['erro'=>'reviews not found', 404]);

        }
        return new ReviewResource($review);
    }

    public function update(int $id, ReviewUpdateRequest $request){
        $data = $request->validated();
        try{
            $review = $this->reviewService->update($id, $data);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'reviews not found', 404]);
        }
        return new ReviewResource($review);
    }
    public function delete(int $id){
        try{
            $review = $this->reviewService->delete($id);
        }catch(ModelNotFoundException $e){
            return response()->json(['error'=>'reviews not found', 404]);
        }
        return new ReviewResource($review);
    }
}
