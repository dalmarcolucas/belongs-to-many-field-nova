<?php

use Benjacho\BelongsToManyField\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

Route::get('/{resource}/options/{relationship}/{optionsLabel}/{dependsOnValue?}/{dependsOnKey?}', [ResourceController::class, 'index']);
