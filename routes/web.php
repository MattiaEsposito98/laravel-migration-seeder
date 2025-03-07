<?php

use App\Http\Controllers\Controller\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layouts.app');
// });

Route::get('/', [PageController::class, 'index']);
