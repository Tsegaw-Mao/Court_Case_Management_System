<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Judge\JudgeCaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
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
route::post('/create/case', [AdminController::class,'store'])->name('admin.save');
route::get('/hh',[JudgeCaseController::class,'index'])->name('JudgeCase');