<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
//use Illuminate\Support\Facades\Facade;

//class Auth extends Facade{}


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
    return view('auth.login');
});
/*
Route::get('/empleado', function () {
    return view('empleado.index');
});
Route::get('/empleado/create', [EmpleadoController::class,'create']);
*/
Route::resource('empleado',EmpleadoController::class)->middleware('auth');
Auth::routes(['reset'=>false]);
//Auth::routes();
Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
Route::group(['midlewere'=>'auth'],function(){

    Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
    //route::get('/export',[EmpleadoController::class,'export'])->name('export');

});
