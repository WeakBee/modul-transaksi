<?php

use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', [UserController::class,'transaksiHome']);
Route::get('/datatransaksi-pdf', function () {
    $data = Transaksi::all();
    return view('datatransaksi-pdf',['data' => $data]);
});
// User Route
Route::post('/register', [UserController::class,'register']);
Route::post('/logout', [UserController::class,'logout']);
Route::post('/login', [UserController::class,'login']);
// User Route

// Transaksi Route
Route::post('/create-transaksi', [TransaksiController::class,'createTransaksi']);
Route::get('/edit-transaksi/{data}', [TransaksiController::class,'showEditTransaksi']);
Route::put('/edit-transaksi/{data}', [TransaksiController::class,'actuallyEditTransaksi']);
Route::delete('/delete-transaksi/{data}', [TransaksiController::class,'deleteTransaksi']);
// Transaksi Route

//export
Route::get('/export-pdf', [TransaksiController::class,'exportpdf']);
Route::get('/export-excel', [TransaksiController::class,'exportexcel']);
Route::get('/kirim-email', [TransaksiController::class,'kirimEmail']);
Route::get('/success-email', [TransaksiController::class,'successEmail']);
//export