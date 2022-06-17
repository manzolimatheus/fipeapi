<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlateController;

Route::get('placas/{plate}', [PlateController::class, 'get']);

