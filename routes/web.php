<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\portfolioController;
use App\Http\Controllers\servicesController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\DB;
use App\Models\portfolio;

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

Route::get('/',[HomeController::class,'index'])->name('index');

Route::get('/portfolios',[portfolioController::class,'index'])->name('portfolio');
Route::post('/portfolio',[portfolioController::class,'addPortfolio'])->name('addNewPortfolio');
Route::post('/portfolio/addimages',[portfolioController::class,'addPortfolioImage'])->name('addPortfolioImages');


Route::get('/delete/{id}',[portfolioController::class,'deletePortfolio'])->name('deletePortfolio');
Route::post('/update/{id}',[portfolioController::class,'updatePortfolio']);


Route::get('/services',[servicesController::class,'index'])->name('services');
Route::post('/services',[servicesController::class,'addService'])->name('addNewService');




Route::get('/admin',function(){
    $portfolio=DB::table('portfolios')->get();
    $service=DB::table('services')->get();
    return view('admin/admin',['allportfolios'=>$portfolio],['allservices'=>$service]);
})->name('admin');

Route::get('/login',function(){
    return view('admin/loginAdmin');
})->name('loginpage');

Route::get('/logout',[userController::class,'signOut'])->name('logout');
Route::post('/signin',[userController::class,'logIn'])->name('login');


Route::get('/showBlog',[BlogController::class,'index'])->name('showBlogs');
Route::post('/addBlog',[BlogController::class,'addBlogs'])->name('addBlogs');


Route::get('/services',[servicesController::class,'index'])->name('services');

Route::post('/services/addimages',[servicesController::class,'addServicesImages'])->name('addServicesImages');

Route::get('/aboutus',function(){
    $portfolio=DB::table('portfolios')->get();
    $service=DB::table('services')->get();
    return view('aboutus',['allportfolio'=>$portfolio],['allservices'=>$service]);
})->name('aboutus');