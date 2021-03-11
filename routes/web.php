<?php

use Illuminate\Support\Facades\Route;

// Serve our SPA page
Route::view('/', 'app')->name('index');
