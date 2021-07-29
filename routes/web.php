<?php


use App\Http\Controllers\Admin\NumberController;
use App\Http\Controllers\Admin\SapatoController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\RegistrosVendaController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\RegistrosVenda;
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

Route::prefix('vendas')->name('vendas.')->group(function(){
    Route::get('/', [SapatoController::class, 'index'])->name('index');
    });

Route::get('logout', [LoginController::class, 'logout']);

Route::group(['middleware' => ['auth']], function(){
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::prefix('vendas')->name('vendas.')->group(function(){
            Route::get('/', [SapatoController::class, 'index'])->name('index');

            Route::get('/registros_cores', [ColorController::class, 'registros'])->name('registros_cores');
            Route::post('/cores', [ColorController::class, 'cor'])->name('cor');
            Route::get('/registros_cores/cores/create', [ColorController::class, 'create'])->name('create_cor');
            Route::get('/registros_cores/{color}/edit', [ColorController::class, 'edit'])->name('edit_cor');
            Route::post('/registros_cores/update/{color}', [ColorController::class, 'update'])->name('update_cor');
            Route::get('/registros_cores/delete/{color}', [ColorController::class, 'destroy'])->name('destroy_cor');

            Route::get('/registros_numeros', [NumberController::class, 'registros'])->name('registros_numeros');
            Route::post('/numeros', [NumberController::class, 'numero'])->name('numero');
            Route::get('/registros_numeros/numeros/create', [NumberController::class, 'create'])->name('create_numero');
            Route::get('/registros_numeros/{number}/edit', [NumberController::class, 'edit'])->name('edit_numero');
            Route::post('/registros_numeros/update/{number}', [NumberController::class, 'update'])->name('update_numero');
            Route::get('/registros_numeros/delete/{number}', [NumberController::class, 'destroy'])->name('destroy_numero');

            Route::get('/registros_clientes', [ClienteController::class, 'registros'])->name('registros_clientes');
            Route::post('/clientes', [ClienteController::class, 'cliente'])->name('cliente');
            Route::get('/registros_clientes/clientes/create', [ClienteController::class, 'create'])->name('create_cliente');
            Route::get('/registros_clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('edit_cliente');
            Route::post('/registros_clientes/update/{cliente}', [ClienteController::class, 'update'])->name('update_cliente');
            Route::get('/registros_clientes/delete/{cliente}', [ClienteController::class, 'destroy'])->name('destroy_cliente');

            Route::get('/registros_sapatos', [SapatoController::class, 'registros'])->name('registros_sapatos');
            Route::post('/sapatos', [SapatoController::class, 'sapato'])->name('sapato');
            Route::get('/registros_sapatos/sapatos/create', [SapatoController::class, 'create'])->name('create_sapato');
            Route::get('/registros_sapatos/{sapato}/edit', [SapatoController::class, 'edit'])->name('edit_sapato');
            Route::post('/registros_sapatos/update/{sapato}', [SapatoController::class, 'update'])->name('update_sapato');
            Route::get('registros_sapatos/delete/{sapato}', [SapatoController::class, 'destroy'])->name('destroy_sapato');

            Route::get('/registros_vendas', [RegistrosVendaController::class, 'index'])->name('registros_vendas');

            Route::get('/{sapato}', [SapatoController::class, 'escolherCliente'])->name('escolher_cliente');
            Route::get('/vendas/{sapato}/carrinho', [SapatoController::class, 'carrinho'])->name('carrinho');
            Route::get('/finalizada_compra/{sapato}/{cliente}', [SapatoController::class, 'final'])->name('final');       
        });    
    });
});

 // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');