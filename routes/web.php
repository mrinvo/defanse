<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\AdController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\CleaningController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\dashboard\ClerkController;
use App\Http\Controllers\dashboard\JopController;

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
    return redirect()->route('dashboard');
})->middleware('admin');

Route::get('login', [AuthenticatedSessionController::class, 'create'])
->name('login');



  Route::get('/dashboard/home', [HomeController::class,'home'])->middleware(['admin'])->name('dashboard');



Route::prefix('/dashboard')->name('admin.')->group(function (){


    Route::middleware('admin')->group(function () {

        Route::get('/logout',[AdController::class,'destroy'])->name('logout');
        Route::get('/profile',[AdController::class,'profile'])->name('profile');
        Route::get('/edit-profile',[AdController::class,'edit_profile'])->name('profile.edit');
        Route::post('/update-profile',[AdController::class,'update_profile'])->name('profile.update');
        Route::get('/change-password',[AdController::class,'change_password'])->name('password.change');
        Route::post('/update-password',[AdController::class,'update_password'])->name('password.update');
        Route::get('delete/{id}',[AdController::class,'delete'])->name('delete');
        Route::get('/adduser',[AdController::class,'adduser'])->name('adduser');
        Route::post('/storeuser',[AdController::class,'storeuser'])->name('storeuser');
        Route::get('/edituser/{id}',[AdController::class,'edituser'])->name('edituser');
        Route::post('updateuser',[AdController::class,'updateuser'])->name('updateuser');

        //jops routes

        Route::get('/jop/index',[JopController::class,'index'])->name('jop.index');
        Route::get('/jop/create',[JopController::class,'create'])->name('jop.create');
        Route::post('/jop/store',[JopController::class,'store'])->name('jop.store');
        Route::get('/jop/edit/{id}',[JopController::class,'edit'])->name('jop.edit');
        Route::post('/jop/update',[JopController::class,'update'])->name('jop.update');
        Route::get('/jop/delete/{id}',[JopController::class,'delete'])->name('jop.delete');

        //end jops routes

        //jops routes

        Route::get('/clerk/index',[ClerkController::class,'index'])->name('clerk.index');
        Route::get('/clerk/index/new',[ClerkController::class,'index'])->name('clerk.new');
        Route::get('/clerk/index/pending',[ClerkController::class,'index'])->name('clerk.pending');
        Route::get('/clerk/index/accepted',[ClerkController::class,'index'])->name('clerk.accepted');
        Route::get('/clerk/index/rejected',[ClerkController::class,'index'])->name('clerk.rejected');
        Route::get('/clerk/create',[ClerkController::class,'createclerk'])->name('clerk.create');
        Route::post('/clerk/store',[ClerkController::class,'storeclerk'])->name('clerk.store');
        Route::get('/clerk/send/{code}',[ClerkController::class,'send'])->name('clerk.send');
        Route::post('/clerk/verify',[ClerkController::class,'verify'])->name('clerk.verify');
        Route::get('/clerk/edit/{id}',[ClerkController::class,'edit'])->name('clerk.edit');
        Route::post('/clerk/update',[ClerkController::class,'update'])->name('clerk.update');
        Route::get('/clerk/delete/{id}',[ClerkController::class,'delete'])->name('clerk.delete');
        Route::get('/clerk/details/{id}',[ClerkController::class,'details'])->name('clerk.details');
        Route::post('/clerk/status',[ClerkController::class,'status'])->name('clerk.status');
        Route::post('/clerk/index/new',[ClerkController::class,'new'])->name('clerk.index.new');
        Route::post('/clerk/index/pending',[ClerkController::class,'pending'])->name('clerk.index.pending');
        Route::post('/clerk/index/rejected',[ClerkController::class,'rejected'])->name('clerk.index.rejected');
        Route::post('/clerk/index/accepted',[ClerkController::class,'accepted'])->name('clerk.index.accepted');



        //end jops routes






    });
    require __DIR__.'/admin_auth.php';

});



//  require __DIR__.'/auth.php';
