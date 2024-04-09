<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\AppendController;
use App\Http\Controllers\Admin\DashboadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
 
Route::get('login',[AuthController::class, 'add_login']);
Route::post('login-users',[AuthController::class, 'auth_login']);
Route::get('registers',[AuthController::class, 'add_registers']);
Route::post('create-users',[AuthController::class, 'create_users']);
Route::get('forgate-password',[AuthController::class, 'get_forgate_password']);
Route::post('forgate-password',[AuthController::class, 'forgate_users_password']);
Route::get('logout',[AuthController::class, 'logout']);



Route::group(['middleware'=>'adminusers'],function(){ 

    // users
    Route::get('panel/dashboard',[DashboadController::class, 'dashboard']);
    Route::get('panel/user/list',[UserController::class, 'user']);
    Route::get('panel/user/add-form',[UserController::class, 'add_users']);
    Route::post('panel/user/store-users-data',[UserController::class, 'store_users_data']);
    Route::get('panel/user/edit/{id}',[UserController::class, 'edit_user']);
    Route::post('panel/user/update/{id}',[UserController::class, 'update_users_data']);
    Route::get('panel/user/delete/{id}',[UserController::class, 'delete_user']);

     // category
     Route::get('panel/category/list',[CategoryController::class, 'category']);
     Route::get('panel/category/add-form',[CategoryController::class, 'add_category']);
     Route::post('panel/category/store-category-data',[CategoryController::class, 'store_category_data']);
     Route::get('panel/category/edit/{slug?}',[CategoryController::class, 'edit_category']);
     Route::post('panel/category/update/{slug?}',[CategoryController::class, 'update_category_data']);
     Route::get('panel/category/delete/{slug?}',[CategoryController::class, 'delete_category']);

     // Blogs
     Route::get('panel/blog/list',[BlogController::class, 'blog']);
     Route::get('panel/blog/add-form',[BlogController::class, 'add_blog']);
     Route::post('panel/blog/store-blog-data',[BlogController::class, 'store_blog_data']);
     Route::get('panel/blog/edit/{slug?}',[BlogController::class, 'edit_blog']);
     Route::post('panel/blog/edit/{slug?}',[BlogController::class, 'update_blog_data']);
     Route::get('panel/blog/delete/{slug?}',[BlogController::class, 'delete_blog']);
});




 






// Append Route
Route::get('append',[AppendController::class, 'index']);
Route::post('/append-store-data', [AppendController::class, 'store']);
Route::get('/form-submit', [AppendController::class, 'form_get']);
Route::post('/submit', [AppendController::class, 'submit_data']);
// frontend 
Route::get('/',[HomeController::class, 'getHome']);
