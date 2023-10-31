<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\MainController;

use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('contacts', [MainController::class, 'contacts'])->name('contacts');
Route::post('contacts', [MainController::class, 'sendEmail'])->name('sendEmail');



Route::get('admin', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::delete('admin/products/{product}', [ProductController::class, 'destroy']);
Route::post('/admin/products/update/{product}', [ProductController::class, 'update']);
Route::resource('admin/categories', CategoryController::class);
Route::resource('admin/products', ProductController::class);





/* Route::get('category/{category}', function(Category $category){
    dd($category);

    //$category = Category::find($id);
    return view();
}); */