<?php

use Vasar\Simplemde\Http\Controllers\SimplemdeController;

Route::get('simplemde', SimplemdeController::class.'@index');