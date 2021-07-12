<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\programController;
use App\Http\Controllers\programshowController;
use App\Http\Controllers\progController;
use App\Http\Controllers\eduprogramController;
// use App\Http\Controllers\facilitatorandparticipantController;
use App\Http\Controllers\programparticipantController;
use App\Http\Controllers\programfacilitatorController;
use App\Http\Controllers\materialController;
use App\Http\Controllers\feedBackController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\resultController;
use App\Http\Controllers\facilityController;
use App\Http\Controllers\agendaController;
use App\Http\Controllers\evaluationController;


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


// Route::get('/', function () {
//     return view('add-edit-delete-facilitator');
// });










Route::view('/registration', 'facilitatorParticipantRegisteration');
Route::view('/addPdcProgram', 'addProgram');
Route::view('/addEduProgram', 'addEducationalProgram');
Route::view('/facilitatorRegisteration', 'addFacilitator');
Route::view('/participantRegisteration', 'addParticipant');
// Route::view('/programEnrollment', 'enroll-program-info');


// Route::resource('/addFacilitator', facilitatorandparticipantController::class);

Route::resource('/participantList', programparticipantController::class);
Route::resource('/participantProfile', programparticipantController::class);
Route::resource('/facilitatorList', programfacilitatorController::class);
Route::resource('/facilitatorProfile', programfacilitatorController::class);
Route::resource('/educationalProgramList', eduprogramController::class);
Route::resource('/educationalPrograminfo', eduprogramController::class);
Route::resource('/pdcProgramList', programController::class);
Route::resource('/pdcProgramInfo', programController::class);
Route::resource('/enrolledPdcProgramInfo', programController::class);
Route::resource('/pdcProgramAttendance', programController::class);
Route::resource('/comAllPrograms', programController::class);
Route::resource('/participantEnrolledPrograms', programController::class);
Route::resource('/facilitatorEnrolledPrograms', programController::class);
Route::resource('/facilitatorMaterials', materialController::class);
Route::resource('/materials', materialController::class);
Route::resource('/feedback', feedBackController::class);
Route::resource('/pdcProgramAttendanceEntry', attendanceController::class);
Route::resource('/pdcProgramResult', resultController::class);
Route::resource('/pdcProgramEvaluation', evaluationController::class);







Route::resource('/facilitatorList/{id}/edit', programfacilitatorController::class);
Route::resource('/participantList/{id}/edit', programparticipantController::class);
Route::resource('/educationalProgramList/{id}/edit', eduprogramController::class);
Route::resource('/pdcProgramInfo/{id}/edit', programController::class);
    Route::resource('/enrolledPdcProgramInfo/{id}/edit', programController::class);

Route::resource('/pdcProgramAttendance/{id}/edit', programController::class);
Route::resource('/facilitatorMaterials/{id}/edit', materialController::class);
Route::resource('/pdcProgramAttendanceStore', attendanceController::class);
Route::resource('/pdcProgramAttendanceEntry/{id}/edit', attendanceController::class);
Route::resource('/pdcProgramResult/{id}/edit', resultController::class);
Route::resource('/pdcProgramEvaluation/{id}/edit', evaluationController::class);






// show pagers with specific ID  methid:: edit()
Route::resource('/materials/{id}', materialController::class);
Route::resource('/comAllPrograms/{id}', programController::class);
Route::resource('/participantEnrolledPrograms/{id}', programController::class);
Route::resource('/facilitatorEnrolledPrograms/{id}', programController::class);
Route::resource('/feedback/{id}', feedBackController::class);
Route::resource('/facilitatorMaterials/{id}', materialController::class);
Route::resource('/educationalPrograminfo/{id}', eduprogramController::class);
Route::resource('/pdcProgramInfo/{id}', programController::class);
Route::resource('/enrolledPdcProgramInfo/{id}', programController::class);

Route::resource('/pdcProgramAttendance/{id}', programController::class);
Route::resource('/pdcProgramAttendanceEntry/{id}', attendanceController::class);
Route::resource('/pdcProgramResult/{id}', resultController::class);
Route::resource('/pdcProgramEvaluation/{id}', evaluationController::class);





Route::resource('/participantList/{id}', programparticipantController::class);
Route::resource('/facilitatorList/{id}', programfacilitatorController::class);
Route::resource('/educationalProgramList/{id}', eduprogramController::class);










Route::resource('/participantFacilitatorStore', facilitatorandparticipantController::class);
Route::resource('/facilitatorStore', facilitatorandparticipantController::class);
Route::resource('/participantStore', facilitatorandparticipantController::class);
Route::resource('/facilitatorMaterials', materialController::class);



/*   Educational programs ROUTES    */



/*   Facilitators And Participants ROUTES    */




































// Route::view('login', 'admin-registeration');
// Route::view('/','test');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


// require __DIR__.'/auth.php';