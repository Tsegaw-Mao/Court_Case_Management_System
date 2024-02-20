<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttorneyController;
use App\Http\Controllers\DefendantController;
use App\Http\Controllers\DetectiveController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\PlaintiffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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


route::get('/admin/home/{uid}', [AdminController::class,'index'])->name('admin.home');
Route::get('/admin/index', [AdminController::class,'index2'])->name('admin.index');
Route::get('/admin/index2', [AdminController::class,'index3'])->name('admin.users');
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
route::get('/plaintiff/list',[PlaintiffController::class, 'index'])->name('plaintiff.index');
route::get('/plaintiff/cases/show/{uid}', [PlaintiffController::class,'allcase'])->name('plaintiff.allcase');
route::get('/plaintiff/mycase',[PlaintiffController::class, 'mycases'])->name('plaintiff.mycase');

route::get('/defendant/create',[DefendantController::class,'create'])->name('defendant.create');
route::post('/defendant/store', [ DefendantController::class,'store'])->name('defendant.store');
route::get('/defendant/list',[DefendantController::class, 'index'])->name('defendant.index');
route::get('/defendant/cases/show/{uid}', [DefendantController::class,'allcase'])->name('defendant.allcase');
route::get('/defendant/mycase',[DefendantController::class, 'mycases'])->name('defendant.mycase');

route::get('/lawyer/create',[LawyerController::class,'create'])->name('lawyer.create');
route::post('/lawyer/store', [ LawyerController::class,'store'])->name('lawyer.store');
route::get('/lawyer/cases/show/{uid}', [LawyerController::class,'allcase'])->name('lawyer.allcase');
route::get('/lawyer/mycase',[LawyerController::class, 'mycases'])->name('lawyer.mycase');

route::get('/attorney/create',[AttorneyController::class,'create'])->name('attorney.create');
route::post('/attorney/store', [ AttorneyController::class,'store'])->name('attorney.store');
route::get('/attorney/cases/show/{uid}', [AttorneyController::class,'allcase'])->name('attorney.allcase');
route::get('/attorney/case/assign/{aid}/{cid}', [AttorneyController::class, 'assignCase'])->name('attorney.case');
route::get('/attorney/assign/{cid}',[AttorneyController::class, 'assign'])->name('attorney.assign');
route::get('/attorney/list',[AttorneyController::class, 'index'])->name('attorney.index');
route::get('/attorney/mycase',[AttorneyController::class, 'mycases'])->name('attorney.mycase');
route::get('/attorney/case/status/up/{cid}',[AttorneyController::class, 'statusup'])->name('attorney.status.up');
route::get('/attorney/case/status/down/{cid}',[AttorneyController::class, 'statusdown'])->name('attorney.status.down');

route::get('/judge/create',[JudgeController::class,'create'])->name('judge.create');
route::post('/judge/store', [ JudgeController::class,'store'])->name('judge.store');
route::get('/judge/cases/show/{uid}', [JudgeController::class,'allcase'])->name('judge.allcase');
route::get('/judge/case/assign/{jid}/{cid}', [JudgeController::class, 'assignCase'])->name('judge.case');
route::get('/judge/assign/{cid}',[JudgeController::class, 'assign'])->name('judge.assign');
route::get('/judge/list',[JudgeController::class,'index'])->name('judge.index');
route::get('/judge/mycase',[JudgeController::class, 'mycases'])->name('judge.mycase');
route::get('/judge/case/status/down/{cid}',[JudgeController::class, 'statusdown'])->name('judge.status.down');
route::get('/judge/case/status/up/{cid}',[JudgeController::class, 'statusup'])->name('judge.status.up');
route::get('/judge/case/date/{cid}',[JudgeController::class, 'casedate'])->name('judge.date');
route::post('/judge/case/adddate/{cid}',[JudgeController::class, 'adddate'])->name('judge.adddate');

route::get('/detective/create',[DetectiveController::class,'create'])->name('detective.create');
route::post('/detective/store', [ DetectiveController::class,'store'])->name('detective.store');
route::get('/detective/cases/show/{uid}', [DetectiveController::class,'allcase'])->name('detective.allcase');
route::get('/detective/case/assaign/{did}/{cid}', [DetectiveController::class,'assignCase'])->name('detective.case');
route::get('/detective/assign/{cid}',[DetectiveController::class, 'assign'])->name('detective.assign');
route::get('/detective/list',[DetectiveController::class, 'index'])->name('detective.index');
route::get('/detective/mycase',[DetectiveController::class, 'mycases'])->name('detective.mycase');
route::get('/detective/case/status/up/{cid}',[DetectiveController::class, 'statusup'])->name('detective.status.up');




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







Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
]);
