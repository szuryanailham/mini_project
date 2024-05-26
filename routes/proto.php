<?php
use Illuminate\Support\Facades\Route;

Route::prefix('/proto')->group(function () {
     // http://127.0.0.1:8000/proto/
    Route::get('/', function () {
        return view('Prototype.welcome');
    });
});
