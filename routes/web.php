<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttorneyController;
use App\Http\Controllers\DefendantController;
use App\Http\Controllers\DetectiveController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\PlaintiffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginRegisterController;
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
route::post('/create/case', [AdminController::class,'store'])->name('admin.store');



route::get('/plaintiff/create',[PlaintiffController::class,'create'])->name('plaintiff.create');
route::post('/plaintiff/store', [ PlaintiffController::class,'store'])->name('plaintiff.store');

route::get('/defendant/create',[DefendantController::class,'create'])->name('defendant.create');
route::post('/defendant/store', [ DefendantController::class,'store'])->name('defendant.store');

route::get('/lawyer/create',[LawyerController::class,'create'])->name('lawyer.create');
route::post('/lawyer/store', [ LawyerController::class,'store'])->name('lawyer.store');


route::get('/attorney/create',[AttorneyController::class,'create'])->name('attorney.create');
route::post('/attorney/store', [ AttorneyController::class,'store'])->name('attorney.store');
route::get('/attorney/cases/show/{id}', [AttorneyController::class,'index'])->name('attorney.index');
route::get('/attorney/case/assign/{aid}/{cid}', [AttorneyController::class, 'assignCase'])->name('attorney.case');

route::get('/judge/create',[JudgeController::class,'create'])->name('judge.create');
route::post('/judge/store', [ JudgeController::class,'store'])->name('judge.store');
route::get('/judge/cases/show/{id}', [JudgeController::class,'index'])->name('judge.index');
route::get('/judge/case/assign/{jid}/{cid}', [JudgeController::class, 'assignCase'])->name('judge.case');


route::get('/detective/create',[DetectiveController::class,'create'])->name('detective.create');
route::post('/detective/store', [ DetectiveController::class,'store'])->name('detective.store');
route::get('/detective/cases/show/{id}', [DetectiveController::class,'index'])->name('detective.index');
route::get('/detective/case/assaign/{did}/{cid}', [DetectiveController::class,'assignCase'])->name('detective.case');







Route::get('/file-upload', [FileUploadController::class, 'index'])->name('fileupload.index');
Route::post('/multiple-file-upload', [FileUploadController::class, 'multipleUpload'])->name('multiple.fileupload');


Route::controller(App\Http\Controllers\CategoryController::class)->group(function () {
    Route::get('categories/{id}', 'index')->name('categories.index');
    Route::get('categories/create/{id}', 'create')->name('categories.create');
    Route::post('categories/store/{id}', 'store')->name('categories.store');
    Route::get('categories/{id}/edit/{cId}', 'edit')->name('categories.edit');
    Route::put('categories/{id}/edit/{cId}', 'update')->name('categories.update');
    Route::get('categories/{id}/delete/{cId}', 'destroy')->name('categories.delete');
});


Route::controller(AuthController::class)->group(function(){
    Route::get('register', 'register')->name('register');
});




Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});






