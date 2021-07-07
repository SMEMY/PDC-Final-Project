<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\programController;
use App\Http\Controllers\programshowController;
use App\Http\Controllers\progController;
use App\Http\Controllers\eduprogramController;
use App\Http\Controllers\facilitatorandparticipantController;

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
    return view('add-edit-delete-facilitator');
});


// Route::get('/info', [progController::class,'showInfo']);

// Route::resource('/addProgram', programController::class);
Route::view('/addProgram', 'addProgram');
Route::resource('/pdcProgramList', programController::class);

// Route::resource('/editPdcProgram/{id}/edit', programController::class)->only([
//     'edit',
// ]);

// Route::resource('/pdcProgramList/{id}/edit', programController::class);

// Route::resource('/editPdcProgram/{id}/edit', programController::class)->only([
//     'edit'
// ]);




Route::resource('/educationalProgramList', eduprogramController::class);
Route::view('login', 'admin-registeration');
Route::view('addEduProgeam', 'add-educational-program');
// Route::resource('/programInfo/{id}', programController::class);



// Route::get('program-list', [progController::class,'programList']);
Route::get('/editPdcProgram/{id}/edit', [progController::class,'edit']);

// Route::resource('/testt/{id}', programshowController::class);
// Route::resource('/n-enroll/{id}', programController::class)->only(['index', 'show']);
// Route::resource('/show', programshowController::class);
// Route::resource('/show/{id?}', programshowController::class);
// Route::resource('/login', userloingController::class);
// Route::resource('/adminregister', );
// Route::resource('/', );
// Route::resource('/', );
// Route::resource('/', );
// Route::resource('/', );
// Route::resource('/', );
// Route::resource('/', );
// Route::resource('/', );
// Route::resource('/', );
// Route::resource('/', );
// Route::resource('/', );
// Route::resource('/', );












// Route::view('/','test');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


// require __DIR__.'/auth.php';