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
use App\Http\Controllers\userAttendanceController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\resultController;
use App\Http\Controllers\facilityController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\agendaController;
use App\Http\Controllers\evaluationController;
use App\Http\Controllers\fquestionnaireController;
use App\Http\Controllers\photoController;
use App\Http\Controllers\programEnrollmentController;
use App\Http\Controllers\deleteFeedbackQuestion;
use App\Http\Controllers\commmonUserController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\facilitatorandparticipantController;
use App\Http\Controllers\userController;
use App\Http\Controllers\admin_infoController;


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

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Route::view('/', 'index')->name('dashboard');
    Route::resource('/dashboard', dashboardController::class);
    Route::view('/addPdcProgram', 'admin.pdc-add-program')->name('addPdcprogram');
    Route::view('/addEduProgram', 'admin.pdc-add-educational-program')->name('addEduProgram');
    Route::resource('/memberRegisterationTwo', userController::class);
    Route::view('/memberRegisteration', 'admin.pdc-add-member')->name('userRegistration');
    Route::get('/deleteQuestion/{id}', [deleteFeedbackQuestion::class, 'deleteQuestion'])->name('');
    Route::get('/deleteQuestionnaire/{id}', [deleteFeedbackQuestion::class, 'deleteProgramQuestionnaire'])->name('');

    Route::resource('/pdcProgramList', programController::class);
    Route::resource('/memberStoreTwo', userController::class);

    Route::resource('/pdcProgramInfo', programController::class);
    Route::resource('/pdcProgramAttendance', userAttendanceController::class);
    Route::resource('/pdcProgramFacility', facilityController::class);
    Route::resource('/pdcProgramAgenda', agendaController::class);
    Route::resource('/pdcProgramEvaluation', evaluationController::class);
    Route::resource('/pdcProgramResult', resultController::class);
    Route::resource('/pdcProgramPhoto', photoController::class);
    Route::resource('/deletePhoto', photoController::class);
    Route::resource('/storeMaterials', materialController::class);
    Route::resource('/feedbackFormInsertion', fquestionnaireController::class);
    Route::resource('/facilitatorProfileForProgram', programfacilitatorController::class);
    Route::resource('/facilitatorProfileForProgramList', programfacilitatorController::class);
    Route::resource('/searchPdcProgram', programController::class);
    //    Route::resource('/pdcProgramDelete', programController::class);



    //////////////////////////
    Route::resource('/educationalProgramList', eduprogramController::class);
    Route::resource('/facilitatorList', programfacilitatorController::class);
    Route::resource('/participantList', programparticipantController::class);
    Route::resource('/participantAllList', programparticipantController::class);
    Route::resource('/memberList', userController::class);

    Route::resource('/feedback', feedBackController::class);
    Route::resource('/feedbackAnswer', feedBackController::class);
    Route::resource('/specificeProgramParticipants', programparticipantController::class);
    Route::resource('/pdcProgramAttendancePaper', userAttendanceController::class);
    Route::resource('/pdcProgramAttendanceReport', userAttendanceController::class);
    Route::resource('/pdcProgramFeedbackReport', fquestionnaireController::class);
    Route::resource('/materials', materialController::class);
    Route::resource('/pdcProgramAttendanceEntry', userAttendanceController::class);
    Route::resource('/searchEducationalProgram', eduprogramController::class);
    Route::resource('/searchFacilitator', programfacilitatorController::class);
    Route::resource('/searchParticipant', programparticipantController::class);
    Route::resource('/deleteMaterial', materialController::class);
    Route::resource('/memberStore', userController::class);
    Route::resource('/participantProfile', programparticipantController::class);
    Route::resource('/facilitatorProfile', programfacilitatorController::class);
    Route::resource('/memberProfile', userController::class);
    Route::resource('/facilitatorEnrollmentForProgram', programEnrollmentController::class);
    Route::resource('/participantEnrolledPrograms', programparticipantController::class);
    Route::resource('/participantEnrollmentForProgram', programEnrollmentController::class);
    Route::resource('/memberEnrollmentForProgram', programEnrollmentController::class);
    Route::resource('/facilitatorEnrolledPrograms', programfacilitatorController::class);
    Route::resource('/downloadPhoto', photoController::class);
    Route::resource('/educationalPrograminfo', eduprogramController::class);
    Route::resource('/downloadMaterial', materialController::class);
    Route::resource('/deleteMaterial', materialController::class);
    Route::resource('/deleteFacilitatorForProgram', programfacilitatorController::class);
});
// Route::middleware(['auth'])->group(function () {
Route::prefix('admin')->group(function () {
    // ROUTES

});

Route::resource('/programs', programController::class);
Route::resource('/userRegistration', commmonUserController::class);

//         // Route::view('home', 'home')->name('home');
// });



// Route::get('/home', function () {
//         dd(\Illuminate\Support\Facades\Auth::user());
//     });


    // Route::view('/login', 'login');

    // Route::resource('/admin/registration', admin_infoController::class);

    ///// Admin user paths














// Route::view('/registration', 'facilitatorParticipantRegisteration');
// Route::view('/chart', 'chart');
// Route::view('/list', 'pdc-programs-employees-list');
// Route::view('/programEnrollment', 'enroll-program-info');

// Route::post('/searchٍEducationalProgram', [searchController::class, 'searchEduProgram']);

// Route::resource('/addFacilitator', facilitatorandparticipantController::class);
// Route::get('/deleteQuestion', [deleteFeedbackQuestion::class, 'deleteQuestion']);
// Route::resource('/programSpecificParticipant', programparticipantController::class);
// Route::resource('/feedbackFormEdition', fquestionnaireController::class);
// Route::resource('/enrolledPdcProgramInfo', programController::class);
// // Route::resource('/participantEnrolledPrograms', programparticipantController::class);
// Route::resource('/facilitatorMaterials', materialController::class);
// // Route::resource('/participantFacilitatorStore', facilitatorandparticipantController::class);
// Route::resource('/publicMemberStore', facilitatorandparticipantController::class);
// Route::resource('/facilitatorMaterials', materialController::class);



// Route::resource('/searchٍEducationalProgram/{id}', eduprogramController::class);

// Route::resource('/storeMaterials/{id}', materialController::class);
// Route::resource('/comAllPrograms/{id}', programController::class);
// Route::resource('/participantEnrolledPrograms/{id}', programparticipantController::class);
// Route::resource('/facilitatorEnrolledPrograms/{id}', programfacilitatorController::class);
// // Route::resource('/feedback/{id}', feedBackController::class);
// Route::resource('/facilitatorMaterials/{id}', materialController::class);
// Route::resource('/educationalPrograminfo/{id}', eduprogramController::class);
// // Route::resource('/pdcProgramInfo/{id}', programController::class);
// Route::resource('/pdcProgramList/{id}', programController::class);
// Route::resource('/memberProfile/{id}', facilitatorandparticipantController::class);
// // Route::resource('/pdcProgramDelete/{id}', programController::class);
// Route::resource('/enrolledPdcProgramInfo/{id}', programController::class);
// // Route::resource('/feedbackFormInsertion/{id}', fquestionnaireController::class);
// // Route::resource('/pdcProgramAttendance/{id}', programController::class);
// // Route::resource('/pdcProgramAttendanceEntry/{id}', attendanceController::class);
// // Route::resource('/pdcProgramResult/{id}', resultController::class);
// // Route::resource('/pdcProgramAgenda/{id}', agendaController::class);
// // Route::resource('/pdcProgramFacility/{id}', facilityController::class);
// // Route::resource('/pdcProgramEvaluation/{id}', evaluationController::class);
// // Route::resource('/specificeProgramParticipants/{id}', programparticipantController::class);
// Route::resource('/programSpecificParticipant/{id}', programparticipantController::class);
// // Route::resource('/pdcProgramAttendancePaper/{id}', attendanceController::class);
// // Route::resource('/pdcProgramAttendanceReport/{id}', attendanceController::class);
// // Route::resource('/pdcProgramPhoto/{id}', photoController::class);
// // Route::resource('/materials/{id}', materialController::class);
// Route::resource('/deleteMaterial/{id}', materialController::class);
// Route::resource('/downloadMaterial/{id}', materialController::class);
// Route::resource('/downloadPhoto/{id}', photoController::class);
// Route::resource('/deletePhoto/{id}', photoController::class);
// Route::resource('/facilitatorProfile/{id}', programfacilitatorController::class);
// Route::resource('/facilitatorProfileForProgram/{id}', programfacilitatorController::class);
// Route::resource('/deleteFacilitatorForProgram/{id}', programfacilitatorController::class);
// Route::resource('/memberList/{id}', facilitatorandparticipantController::class);
// Route::resource('/participantProfile/{id}', programparticipantController::class);
// Route::resource('/feedbackFormEdition/{id}', fquestionnaireController::class);


// Route::resource('/facilitatorList/{id}/edit', programfacilitatorController::class);
// Route::resource('/participantList/{id}/edit', programparticipantController::class);
// Route::resource('/educationalProgramList/{id}/edit', eduprogramController::class);
// Route::resource('/pdcProgramInfo/{id}/edit', programController::class);
// Route::resource('/enrolledPdcProgramInfo/{id}/edit', programController::class);
// Route::resource('/feedbackFormInsertion/{id}/edit', fquestionnaireController::class);
// Route::resource('/facilitatorMaterials/{id}/edit', materialController::class);
// Route::resource('/pdcProgramAttendanceStore/{id}/edit', attendanceController::class);
// Route::resource('/pdcProgramResult/{id}/edit', resultController::class);
// Route::resource('/pdcProgramEvaluation/{id}/edit', evaluationController::class);
// Route::resource('/specificeProgramParticipants/{id}/edit', programparticipantController::class);
// Route::resource('/programSpecificParticipant/{id}/edit', programparticipantController::class);
// Route::resource('/pdcProgramAttendance/{id}/edit', programController::class);
// Route::resource('/pdcProgramAttendanceEntry/{id}/edit', attendanceController::class);
// Route::resource('/pdcProgramAttendancePaper/{id}/edit', attendanceController::class);
// Route::resource('/pdcProgramAttendanceReport/{id}/edit', attendanceController::class);
// Route::resource('/pdcProgramPhoto/{id}/edit', photoController::class);
// // Route::resource('/storeMaterials/{id}/edit', materialController::class);
// Route::resource('/materials/{id}/edit', materialController::class);
// Route::resource('/deleteMaterial/{id}/edit', materialController::class);
// Route::resource('/downloadMaterial/{id}/edit', materialController::class);
// // Route::resource('/pdcProgramDelete/{id}/edit', programController::class);
// // Route::resource('/pdcProgramList/{id}/edit', programController::class);
// Route::resource('/deleteFacilitatorForProgram/{id}/edit', programfacilitatorController::class);
// Route::resource('/membersList/{id}/edit', facilitatorandparticipantController::class);
// Route::resource('/feedbackFormEdition/{id}/edit', fquestionnaireController::class);







// show pagers with specific ID  methid:: edit()





// Route::resource('/participantList/{id}', programparticipantController::class);
// Route::resource('/facilitatorList/{id}', programfacilitatorController::class);
// Route::resource('/educationalProgramList/{id}', eduprogramController::class);













/*   Educational programs ROUTES    */



/*   Facilitators And Participants ROUTES    */




































// Route::view('/','test');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


// require __DIR__.'/auth.php';
