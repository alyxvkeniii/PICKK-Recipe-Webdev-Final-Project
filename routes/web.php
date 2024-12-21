<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Menu2Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\MyrecipeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AddRecipeController;
use App\Http\Controllers\AllRecipeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminUserController;


// GUEST VIEW 

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    // Regular user dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin dashboard route
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin');
    Route::get('/admin-users', [AdminUserController::class, 'index'])->name('admin-users');
    Route::delete('/admin-users/{id}', [AdminUserController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::delete('/admin/delete/{id}', [AdminDashboardController::class, 'deletePost'])->name('admin.delete');
    Route::put('/admin/approve/{id}', [AdminDashboardController::class, 'approvePost'])->name('admin.approve');
    
});

Route::get('/menu', function () {
    return view('menu');
});
Route::view('/menu', 'menu')->name('menu');


Route::get('/faq', function () {
    return view('faq');
});

Route::view('/faq', 'faq')->name('faq');

Route::view('/policy', 'policy')->name('policy');

Route::view('/privacy', 'privacy')->name('privacy');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); 
Route::post('/login', [LoginController::class, 'login']); 

Route::get('/sign-up', [LoginController::class, 'showSignUpForm'])->name('sign-up');
Route::post('/sign-up', [LoginController::class, 'signUp']);



// USER VIEW

Route::get('/menu2', [Menu2Controller::class, 'index'])->name('menu2');

Route::get('/faq2', function () {
    return view('faq2');
});
Route::view('/faq2', 'faq2')->name('faq2');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::get('/my-recipe', [AllRecipeController::class, 'index']);
Route::get('/favorites', function () {
    return view('favorites');
});
Route::view('/favorites', 'favorites')->name('favorites');

Route::view('/use', 'use')->name('use');

Route::view('/terms', 'terms')->name('terms');

Route::get('/add-recipe', function () {
    return view('add-recipe');
});


// DISH ROUTES
Route::get('/dish', function () {
    return view('dish');  // This will render the adobo.blade.php view
})->name('dish');
Route::get('/created', [MyrecipeController::class, 'getRecipesByUser'])->name('created');

Route::post('/my-recipe', [AddRecipeController::class, 'store'])->name('my-recipe');


Auth::routes();
Route::get('/menu/{recipeId}', [DishController::class, 'showRecipe']);
Route::post('/comments', [DishController::class, 'store'])->name('comments.store');
Route::post('/favorite/add', [DishController::class, 'addFavorite'])->name('favorite.add');
Route::post('/favorite/remove', [DishController::class, 'removeFavorite'])->name('favorite.remove');
Route::get('/favorites', [FavoriteController::class, 'favorites'])->name('favorites');

Route::get('/recipe/{id}', [DishController::class, 'showRecipe'])->name('recipe.show');

Route::get('/dish/{recipeId}', [DishController::class, 'showRecipe'])->name('dish');