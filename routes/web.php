<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactMessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/produtos', function () {
    return view('portfolio');
})->name('produtos');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/teste', function(){
    return redirect(route('blog'))->withSuccess([
        'title' => 'Tudo certo!',
        'message' => 'Recebemos a sua mensagem e em breve retornaremos.'
    ]);
});
 
Route::get('/contato', [ContactMessageController::class, 'index']);
Route::post('/contato', [ContactMessageController::class, 'store'])->name('postContato');
Route::get('/contato/{id}', [ContactMessageController::class, 'show']);


