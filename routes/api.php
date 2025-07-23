<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api_controller;

Route::post('/add_userss', [api_controller::class, 'store']);
?>
