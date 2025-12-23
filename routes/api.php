<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;

// TODO name
Route::get("/quotes", [QuoteController::class, "getAll"]);
Route::get("/quotes/{id}", [QuoteController::class, "getById"]);
Route::post("/quotes", [QuoteController::class, "addOne"]);
Route::delete("/quotes/{id}", [QuoteController::class, "deleteById"]);
Route::put("/quotes/{id}", [QuoteController::class, "updateById"]);
Route::patch("/quotes/{id}", [QuoteController::class, "updateById"]);
