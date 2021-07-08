<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Result;
use App\Models\Facility;
use App\Models\Agenda;
use App\Models\Material;
Use Illuminate\Support\Facades\DB;


class programController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
       $programs =  Program::orderBy('id', 'desc')->get();
       
        return view('edit-delete-pdc-program', compact('programs'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {
        // this part is belongs to Program Model
        $addProgram = new Program;
        $addProgram->name = $request->name;
        $addProgram->type = $request->type;
        $addProgram->sponsor = $request->sponsor;
        $addProgram->supporter = $request->supporter;
        $addProgram->manager = $request->manager;
        $addProgram->facilitator = $request->facilitator;
        $addProgram->participant_amount = $request->participant_amount;
        $addProgram->fund = $request->fund;
        $addProgram->fund_type = $request->fund_type;
        $addProgram->fee_able = $request->fee_able;
        $addProgram->fee = $request->fee;
        $addProgram->fee_type = $request->fee_type;
        $addProgram->program_description = $request->program_description;
        $addProgram->facilitator_code = rand(1000000, 9000000);
        $addProgram->participant_code = rand(1000000, 9000000);
        $addProgram->year = $request->year;
        $addProgram->month = $request->month;
        $addProgram->start_day = $request->start_day;
        $addProgram->end_day = $request->end_day;
        $addProgram->start_time = $request->start_time;
        $addProgram->end_time = $request->end_time;
        $addProgram->days_duration = 12;
        $addProgram->hours_duration = 12;
        $addProgram->campus_name = $request->campus_name;
        $addProgram->block_name = $request->block_name;
        $addProgram->block_number = $request->block_number;
        $addProgram->room_number = $request->room_number;
        $addProgram->save();
        // this part belongs to Facility Model
        foreach ($request->facility as  $value) {
            $programFacility = new Facility;
            $programFacility->facility = $value;
            $programFacility->program_id = Program::max('id');
            $programFacility->save();
        }
        // this part belongs to Agenda Model
        foreach ($request->agenda as  $value) {
            $programAgenda = new Agenda;
            $programAgenda->agenda = $value;
            $programAgenda->program_id = Program::max('id');
            $programAgenda->save();
        }
      
        
        // return "done";
        return redirect('pdcProgramList');
        
        

        // $add_program->name = 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return $id;
        return view('program-enrollment');
        // return Program::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        return $id;
    }
}
