<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;

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

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
        'active' => 'home',
    ]);
});
Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'active' => 'about',
        'name' => 'Rizki',
        'email' => 'rizki@gmail.com',
        'image' => 'profil.png',

    ]);
});



Route::get('/blog',[PostController::class, 'index'] );
Route::get('/blog/{post:slug}',[PostController::class, 'show'] );

Route::get('/categories',function(){
    return view('categories',[
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}',function (Category $category) {
        return view('posts',[
                'title' => "Post By Category :$category->name",
                'active' => 'categories',
                'posts' => $category->posts->load('category','author')
                // 'category' => $category->name
            ]);
});


Route::get('/authors/{author:username}', function (User $author) {
    return view('posts',[
        'title' => "Post By Author :$author->name",
        'active' => 'posts',
        'posts' => $author->posts->load('category','author')
        // 'category' => $category->name
    ]);
});


Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);


Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);

// Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');

//route yang mengarah res

Route::get('/dashboard',function(){
    return view('dashboard.index');
})->middleware('auth');


// middleware auth utnuk yang sudah login
// middleware guest untuk useryang belum login

Route::get('/dashboard/posts/cekSlug',[DashboardPostController::class,'cekSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');


Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');