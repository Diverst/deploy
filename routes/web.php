<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserManagement;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TableController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/dashboard', [DataController::class,'index'])->middleware('auth');
Route::get('/table', function () {
    return view('table');
})->middleware('auth');
// USER MANAGEMENT





// Auth::routes();
Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);



Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [DataController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    //Projects Routes (Proper Code)
    Route::get('projects', [ProjectsController::class, 'index'])->name('projects');
    Route::get('/projects/addProjects',[ProjectsController::class,'indexAdd']);
    Route::post('/projects/addProjects',[ProjectsController::class,'addProjects']);
    Route::get('/projects/deleteProjects/{id}',[ProjectsController::class,'deleteProjects']);
    Route::get('/projects/{id}',[ProjectsController::class,'indexEdit']);
    Route::post('/projects/editProjects/{id}',[ProjectsController::class,'editProjects']);
    Route::get('/exportProjects', [ProjectsController::class, 'export']);
    Route::post('/import',[ProjectsController::class,'importFrom']);
    Route::get('/fileTemplate',[ProjectsController::class,'fileTemplate']);
    
});


Route::group(['middleware'=>'admin'],function(){
    Route::get('/UserManagement', [UserManagement::class,'index']);
Route::get('/UserManagement/add', [UserManagement::class,'addView']);
Route::post('/UserManagement/add', [UserManagement::class,'add']);
Route::get('/UserManagement/{id}',[UserManagement::class,'editView']);
Route::post('/UserManagement/update/{id}',[UserManagement::class,'edit']);
Route::get('/UserManagement/delete/{id}',[UserManagement::class,'delete'])->name('user.delete');
});

Route::group(['middleware'=>'user'],function(){
    Route::get('/UserProfile',[UserManagement::class,'indexProfile']);
    Route::get('/UserProfile/{id}',[UserManagement::class,'editProfileView']);
    Route::post('/UserProfile/{id}',[UserManagement::class,'editProfile']);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
