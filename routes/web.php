<?php

// hallo 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Cache;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('books', BookController::class);


Route::get('test-redis', function () {
    // Cek apakah cache Redis tersedia dan simpan nilai
    Cache::store('redis')->put('test_key', 'Hello, Redis!', 10);

    // Ambil nilai dari cache
    $value = Cache::store('redis')->get('test_key');

    // Kembalikan response untuk melihat apakah cache berhasil tersimpan dan diambil
    return response()->json([
        'message' => 'Cache test completed!',
        'cached_value' => $value,
    ]);
});
