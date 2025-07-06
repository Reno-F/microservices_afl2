<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/calculator', function (Request $request) {
    $angka1 = $request->input('angka1');
    $angka2 = $request->input('angka2');
    $operator = $request->input('operator');

    switch ($operator) {
        case '+':
            $hasil = $angka1 + $angka2;
            break;
        case '-':
            $hasil = $angka1 - $angka2;
            break;
        case '*':
            $hasil = $angka1 * $angka2;
            break;
        case '/':
            $hasil = ($angka2 != 0) ? $angka1 / $angka2 : 'Tidak bisa dibagi nol';
            break;
        default:
            $hasil = 'Operator tidak valid';
    }

    return redirect()->back()->with('hasil', $hasil);
})->name('calculator');
