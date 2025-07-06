<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculate(Request $request)
    {
        $request->validate([
            'angka1' => 'required|numeric',
            'angka2' => 'required|numeric',
            'operator' => 'required|in:+,-,*,/',
        ]);

        $angka1 = $request->input('angka1');
        $angka2 = $request->input('angka2');
        $operator = $request->input('operator');

        $hasil = match($operator) {
            '+' => $angka1 + $angka2,
            '-' => $angka1 - $angka2,
            '*' => $angka1 * $angka2,
            '/' => $angka2 != 0 ? $angka1 / $angka2 : 'Tidak bisa dibagi nol',
        };

        return response()->json([
            'hasil' => $hasil
        ]);
    }
}
