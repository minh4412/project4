<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\BillDetailController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ListBookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StatisticalController;
use App\Http\Controllers\TestMailController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckTypeUser;
use App\Http\Middleware\CheckTypeUser2;
use App\Mail\SendAdmin;
use Illuminate\Support\Facades\Mail;

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
Route::get('/login',[AuthenticateController::class,'login'])->name('login');
Route::get('/login-user',[AuthenticateController::class,'loginUser'])->name('login-user');
Route::post('/login-process', [AuthenticateController::class, 'loginProcess'])->name('login-process');
Route::post('/login-user-process', [AuthenticateController::class, 'loginUserProcess'])->name('login-user-process');

Route::middleware([CheckLogin::class])->group(function(){
    Route::middleware([CheckTypeUser::class])->group(function(){
        Route::get('/dashboard',[StatisticalController::class,'index'])->name('dashboard');
        Route::resource('course',CourseController::class);
        Route::resource('class',GradeController::class);
        Route::resource('student',StudentController::class);
        Route::resource('bill',BillController::class);
        Route::resource('billdetail',BillDetailController::class);
        Route::resource('subject',SubjectController::class);
        Route::resource('major',MajorController::class);
        Route::resource('book',BookController::class);
    });
    
    Route::middleware([CheckTypeUser2::class])->group(function(){
        Route::resource('listbook',ListBookController::class);
        Route::get('/AddCart/{id}',[CartController::class,'AddCart']);
        Route::get('/DeleteItemCart/{id}',[CartController::class,'DeleteItemCart']);
        Route::get('/UpdateItemCart/{id}/{qty}',[CartController::class,'UpdateItemCart']);
        Route::get('/Order',[CartController::class,'Order']);
        Route::get('/CancelOrder/{id}',[CartController::class,'CancelOrder']);
        Route::post('/EditAll',[CartController::class,'EditAll']);
        Route::get('/DeleteAll',[CartController::class,'DeleteAll']);
        Route::post('/epayment',[CartController::class,'epayment']);
        Route::get('/payreturn',[CartController::class,'payreturn']);
        Route::resource('history',HistoryController::class);
        Route::get('/mycart', function () {
            return view('cart');
        });
    });

    Route::get('/logout',[AuthenticateController::class,'logout'])->name('logout');
    Route::resource('profile',ProfileController::class);
    Route::get('/testmail',[TestMailController::class,'testmail'])->name('testmail');
});