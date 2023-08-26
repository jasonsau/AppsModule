<?php

use Apps\HelloWordl\Controllers\HelloWordController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HelloWordController::class, 'index']);
Route::get('/hello/{name}', [HelloWordController::class, 'indexName']);
