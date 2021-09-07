<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EdufieldController;
use App\Http\Controllers\EduqualController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OccupationController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\AdminMatches;
use App\Http\Livewire\DeleteUser;
use App\Http\Livewire\EditMatch;
use App\Http\Livewire\Matches;
use App\Http\Livewire\ViewAdminMatch;
use App\Http\Livewire\ViewAllMatch;
use App\Http\Livewire\ViewMatch;
use App\Http\Livewire\ViewOneMatch;
use App\Http\Livewire\ViewUserMatch;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;
use App\Http\Middleware\isAdmin;
use App\Models\Biblequote;
use App\Models\Matche;
use App\Models\Organization;

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
    return view('welcome');
})->name('welcome');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [RegisterController::class, 'register']);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/validate', [LoginController::class, 'validateLogin'])->name('user.validate');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::middleware('auth','disable-backbutton')->get('/welcomeuser', [DashboardController::class, 'index'])->name('welcomeuser');
Route::middleware('auth','disable-backbutton')->get('/admin', [DashboardController::class, 'adminpanel'])->name('admin');
Route::middleware('auth','admin','disable-backbutton')->get('/verification', function(){
      return view('verification-notice');
})->name('verification.notice');

Route::get('/user/verify/{token}', [RegisterController::class,'verifyEmail'])->name('user.verify');

Route::get('/forgot', [LoginController::class, 'forgotpassword'])->name('forgotp');
Route::post('/forgots', [LoginController::class, 'forgotem'])->name('forgotem');

Route::get('/resetpw/reset/{id}/{token}', [LoginController::class, 'resetpw']);
Route::post('/resetpw/reset/', [LoginController::class, 'resetpws'])->name('resetp');

Route::get('/profile/reset', [RegisterController::class, 'profile'])->name('profiler');
Route::post('/profile/reset', [RegisterController::class, 'profiles']);
Route::post('/profile/password', [RegisterController::class, 'pwchange'])->name('changepw');
Route::post('/delete/user/{id}', [DeleteUser::class])->name('delete.user');

Route::group(['middleware' => ['auth','disable-backbutton'], 'prefix' => 'dashboard'], function () {

    // Dashboard
    Route::group(['prefix' => '', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

    // designations
    Route::group(['prefix' => 'designations', 'as' => 'designations.'], function () {
        Route::get('/', [DesignationController::class, 'index'])->name('index');
        Route::get('create', [DesignationController::class, 'create'])->name('create');
        Route::post('/', [DesignationController::class, 'store'])->name('store');
        Route::get('{designation:id}/edit', [DesignationController::class, 'edit'])->name('edit');
        Route::put('{designation:id}/update', [DesignationController::class, 'update'])->name('update');
        Route::delete('{designation:id}/delete', [DesignationController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'occupations', 'as' => 'occupations.'], function () {
        Route::get('/', [OccupationController::class, 'index'])->name('index');
        Route::get('create', [OccupationController::class, 'create'])->name('create');
        Route::post('/', [OccupationController::class, 'store'])->name('store');
        Route::get('{occupation:id}/edit', [OccupationController::class, 'edit'])->name('edit');
        Route::put('{occupation:id}/update', [OccupationController::class, 'update'])->name('update');
        Route::delete('{occupation:id}/delete', [OccupationController::class, 'destroy'])->name('delete');
    });


    Route::group(['prefix' => 'organizations', 'as' => 'organizations.'], function () {
        Route::get('/', [OrganizationController::class, 'index'])->name('index');
        Route::get('create', [OrganizationController::class, 'create'])->name('create');
        Route::post('/', [OrganizationController::class, 'store'])->name('store');
        Route::get('{organization:id}/edit', [OrganizationController::class, 'edit'])->name('edit');
        Route::put('{organization:id}/update', [OrganizationController::class, 'update'])->name('update');
        Route::delete('{organization:id}/delete', [OrganizationController::class, 'destroy'])->name('delete');
    });


    Route::group(['prefix' => 'eduquals', 'as' => 'eduquals.'], function () {
        Route::get('/', [EduqualController::class, 'index'])->name('index');
        Route::get('create', [EduqualController::class, 'create'])->name('create');
        Route::post('/', [EduqualController::class, 'store'])->name('store');
        Route::get('{eduqual:id}/edit', [EduqualController::class, 'edit'])->name('edit');
        Route::put('{eduqual:id}/update', [EduqualController::class, 'update'])->name('update');
        Route::delete('{eduqual:id}/delete', [EduqualController::class, 'destroy'])->name('delete');
    });


    Route::group(['prefix' => 'edufields', 'as' => 'edufields.'], function () {
        Route::get('/', [EdufieldController::class, 'index'])->name('index');
        Route::get('create', [EdufieldController::class, 'create'])->name('create');
        Route::post('/', [EdufieldController::class, 'store'])->name('store');
        Route::get('{edufield:id}/edit', [EdufieldController::class, 'edit'])->name('edit');
        Route::put('{edufield:id}/update', [EdufieldController::class, 'update'])->name('update');
        Route::delete('{edufield:id}/delete', [EdufieldController::class, 'destroy'])->name('delete');
    });

});

Route::middleware('auth','disable-backbutton')->get('members',[UserController::class, 'index'])->name('members');
Route::middleware('auth','disable-backbutton')->get('viewuser/{id}',[UserController::class, 'viewUser'])->name('view.user');


Route::get('/matches', Matches::class)->middleware(['auth','disable-backbutton'])->name('matches');
Route::get('/viewmatch/{id}', ViewMatch::class)->middleware(['auth','disable-backbutton'])->name('viewmatch');
Route::get('/editmatch/{id}', EditMatch::class)->middleware(['auth','disable-backbutton'])->name('editmatch');
Route::get('/viewallmatch', ViewAllMatch::class)->middleware(['auth','disable-backbutton'])->name('viewallmatch');
Route::get('/viewonematch/{id}', ViewOneMatch::class)->middleware(['auth','disable-backbutton'])->name('viewonematch');
Route::get('/likedby/{uid}/{mid}/{token}',[ LikeController::class,'index'])->name('likedview');
Route::get('/usermatch/{id}/{um}/{token}',ViewUserMatch::class)->middleware(['auth','disable-backbutton'])->name('viewusermatch');

Route::get('/adminmatches',AdminMatches::class)->middleware(['auth','disable-backbutton'])->name('adminmatch');
Route::get('/viewadminmatch/{id}',ViewAdminMatch::class)->middleware(['auth','disable-backbutton'])->name('viewadminmatch');
Route::get('/terms', function(){
      return view('terms');
})->name('terms');

Route::get('/bible', function(){
    $bbq1 = Biblequote::all();
    foreach($bbq1 as $bb){
      $bb->selected = 0;
      $bb->save();
    }
});





Route::get('/test', function(){

    return view('test');

});
