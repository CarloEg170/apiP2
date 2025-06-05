<?php

use App\Models\Genero;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\ReviewController;
use Symfony\Component\Console\Application;
use App\Http\Controllers\UsuarioController;


//return Application::configure(basePath: dirname(__DIR__))
//    ->withRouting(
//        web:__DIR__.'/../routes/web.php',
//        api:__DIR__.'/../routes/console.php',
//        gealth: '/up',
//    )
//    ->withMiddLeware(function (Middleware $middleware){
//        $middleware->group('api', [
//            ForceJsonResponse::class,
//            Illuminate\Routing\Middleware\SubstituteBindings::class,
 //       ]);
//    })
//    ->withExceptions(function (Exception $exceptions){
        //
//    })->creat();

Route::controller(AutorController::class)->group(function(){
    Route::get('/autores', 'get');
    Route::get('/autores/livros', 'getWithLivros');
    Route::get('/autores/{id}', 'details');
    Route::post('/autores', 'store');
    Route::patch('/autores/{id}', 'update');
    Route::delete('/autores/{id}', 'delete');
    Route::get('/autores/livros/{id}', 'findLivros');

});

Route::controller(GeneroController::class)->group(function(){
    Route::get('/generos', 'get');
    Route::get('/generos/livro', 'getWithLivros');
    Route::get('/generos/{id}', 'details');
    Route::post('/generos', 'store');
    Route::patch('/generos/{id}', 'update');
    Route::delete('/generos/{id}', 'delete');
    Route::get('/generos/livros/{id}', 'findLivros');

});


Route::controller(LivroController::class)->group(function(){
    Route::get('/livros', 'get');
    Route::get('/livros/review', 'getWithReview');
    Route::get('/livros/{id}', 'details');
    Route::post('/livros', 'store');
    Route::patch('/livros/{id}', 'update');
    Route::delete('/livros/{id}', 'delete');
    Route::get('/livros/review/{id}', 'findReview');

});


Route::controller(ReviewController::class)->group(function(){
    Route::get('/reviews', 'get');
    Route::get('/reviews/{id}', 'details');
    Route::post('/reviews', 'store');
    Route::patch('/reviews/{id}', 'update');
    Route::delete('/reviews/{id}', 'delete');

});

Route::controller(UsuarioController::class)->group(function(){
    Route::get('/usuarios', 'get');
    Route::get('/usuarios/reviews', 'getWithReviews');
    Route::get('/usuarios/{id}', 'details');
    Route::post('/usuarios', 'store');
    Route::patch('/usuarios/{id}', 'update');
    Route::delete('/usuarios/{id}', 'delete');
    Route::get('/usuarios/reviews/{id}', 'findReviews');

});
