<?php

use App\Http\Controllers\ViemoController;
use Illuminate\Support\Facades\Route;

Route::controller(ViemoController::class)->middleware("auth")->group(function(){
    Route::get("/", "index")->name("vimeo.index");
    Route::post("/", "upload")->name("vimeo.upload");
    Route::get("/vimeo", "list")->name("vimeo.list");
    Route::get("/vimeo/{item}", "detail")->name("vimeo.detail");
    Route::put("/vimeo/{item}", "replace")->name("vimeo.replace");
    Route::delete("/vimeo/{item}", "delete")->name("vimeo.delete");
});