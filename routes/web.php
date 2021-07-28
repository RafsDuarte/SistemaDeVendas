<?php

use App\Http\Controllers\Admin\OneToOneController;
use App\Http\Controllers\Admin\SapatoController;
use App\Http\Controllers\Admin\VendaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $sapatos = \App\Models\Sapato::paginate(10);
        
    return view('admin.sapatos.index', compact('sapatos'));
})->name('home');

Auth::routes();

Route::group(['middleware' => ['auth']], function(){

    Route::prefix('admin')->name('admin.')->group(function(){
    Route::prefix('vendas')->name('vendas.')->group(function(){
    Route::get('/', [SapatoController::class, 'index'])->name('index');
    Route::get('/registros', [VendaController::class, 'index'])->name('registros');
    Route::get('/{sapato}', [SapatoController::class, 'escolherCliente'])->name('cliente');
    Route::post('/{sapato}/carrinho', [SapatoController::class, 'carrinho'])->name('carrinho');
    Route::post('/finalizadacompra/{sapato}/{cliente}', [SapatoController::class, 'final'])->name('final');
        });
    });
});

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');