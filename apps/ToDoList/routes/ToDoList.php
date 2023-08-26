<?php

use Illuminate\support\Facades\Route;
use Apps\ToDoList\Controllers\ToDoListController;


Route::get('/', [ToDoListController::class, 'index']);
