<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Result;
use App\Models\Agenda;
use App\Models\Material;
use App\Models\Eduprogram;
use Illuminate\Support\Facades\DB;


class progController extends Controller
{
    //

    function show()
    {
       
    }

    // function programList()
    // {
    //     // return DB::table('programs')->get();
    //     $programs = DB::table('programs')
    //     ->join('addresses', 'programs.address_id', '=','addresses.id' )
    //     ->join('times', 'programs.time_id', '=', 'times.id')

    //     ->select('programs.*', 'addresses.campus_name', 'times.year', 'times.days_duration')->get();

    //     return view('enrolled-program');
    // }

    function showInfo($id)
    {
        $programs = DB::table('programs')->where('programs.id', $id)
        ->join('addresses', 'addresses.id', '=', 'programs.address_id')
        ->join('times', 'times.id', '=', 'programs.time_id')
        ->select('programs.*', 'addresses.*', 'times.year', 'times.month', 'times.start_day')->get();
    return view('program-info', ["programs"=> $programs]);
    }

    function edit($id)
    {
       $program = Eduprogram::find($id);
    //    return $program->achieving_educational_position;
       return view('editEducationalProgram', compact('program'));
    }

    

    // return view('enrolled-program');
    // return Programsparticipant::with('program', 'programParticipantAndFacilitator')->get();

    // // return $id;

    // // return Program::with('getFacilities')->find(2);
    
    // $programs = Program::with('getFacilities', 'getResults')->find(2);
    // return view('program-info', compact('programs'));


    // return "slkdjfslkdfj";
    //
    // return Program::all();
    // $programs = Program::all();
    // return 
//     $addresses =  Address::all();

// $programs = DB::table('programs')->where('id', 2)->get();
// return $programs;  


//    $programs = DB::table('programs')
//    ->join('addresses', 'programs.address_id', '=', 'addresses.id')
//    ->join('times', 'times.id', '=', 'programs.time_id')
//    ->select('programs.*', 'addresses.*', 'times.*')->get();

// //     // return $programs;
//     return view('notenrolled-program', ['programs'=>$programs]);
}
