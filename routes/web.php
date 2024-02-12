<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Judge\JudgeCaseController;
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



route::get('/', [TemplateController::class,'index'])->name('landing');
route::get('/admin/home', [AdminController::class,'index'])->name('admin.home');
route::get('/admin/create', [AdminController::class,'create'])->name('admin.create');
route::get('/find/{id}',[AdminController::class,'show'])->name('admin.show');
route::get('/admin/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
route::put('/admin/update/{id}', [AdminController::class,'update'])->name('admin.update');
route::delete('/admin/delete/{id}',[AdminController::class,'delete'])->name('admin.delete');
route::get('/admin/readdeletes',[AdminController::class,'readAllSoftDeletes'])->name('admin.readalldeletes');
route::get('/admin/read/{id}',[AdminController::class,'readSoftDeletes'])->name('admin.readdelete');
route::get('/admin/restore/{id}',[AdminController::class,'restoreSoftDeletes'])->name('admin.restore');
route::get('/admin/restoreall',[AdminController::class,'restoreAllSoftDeletes'])->name('admin.restoreall');
route::delete('/admin/permanentdelete/{id}',[AdminController::class,'permanentDelete'])->name("admin.permanentdelete");
route::get("/super/home",[AdminController::class,"index2"])->name('super.home');


route::post('/create/case', [AdminController::class,'store'])->name('admin.save');
Route::get('/file-upload', [FileUploadController::class, 'index'])->name('fileupload.index');
Route::post('/multiple-file-upload', [FileUploadController::class, 'multipleUpload'])->name('multiple.fileupload');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
