<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\FileUploadController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


route::get('/', [TemplateController::class,'index']);
Route::get('/file-upload', [FileUploadController::class, 'index'])->name('fileupload.index');
Route::post('/multiple-file-upload', [FileUploadController::class, 'multipleUpload'])->name('multiple.fileupload');
Route::get('add document', [FileUploadController::class, 'index'])->name('create.index');
