<?php

namespace App\Http\Controllers;

use App\Models\Eduprogram;

use Illuminate\Http\Request;

class eduprogramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs =  Eduprogram::orderBy('id', 'desc')->get();
        $path = '/educationalProgramList';
        return view('list-educational-program', compact('programs', 'path'));
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
        //
        $program = new Eduprogram;
        $program->topic = $request->topic;
        $program->type = $request->type;
        $program->teacher_name = $request->teacher_name;
        $program->father_name = $request->father_name;
        $program->teacher_last_name = $request->teacher_last_name;
        $program->university = $request->university;
        $program->faculty = $request->faculty;
        $program->department = $request->department;
        $program->current_educational_position = $request->current_educational_position;
        $program->achieving_educational_position = $request->achieving_educational_position;
        $program->participant_amount = $request->participant_amount;
        $program->year = $request->year;
        $program->month = $request->month;
        $program->start_day = $request->start_day;
        $program->start_time = $request->start_time;
        $program->campus_name = $request->campus_name;
        $program->block_name = $request->block_name;
        $program->block_number = $request->block_number;
        $program->room_number = $request->room_number;
        $program->save();

        return redirect('educationalProgramList');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $program = Eduprogram::find($id);
        return view('educational-program-info', compact('program'));
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $program = Eduprogram::find($id);
        return view('editEducationalProgram', compact('program'));
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
        // return $request->input('topic');
        $program = Eduprogram::find($id);
        $program->topic = $request->topic;
        $program->type = $request->type;
        $program->teacher_name = $request->teacher_name;
        $program->father_name = $request->father_name;
        $program->teacher_last_name = $request->teacher_last_name;
        $program->university = $request->university;
        $program->faculty = $request->faculty;
        $program->department = $request->department;
        $program->current_educational_position = $request->current_educational_position;
        $program->achieving_educational_position = $request->achieving_educational_position;
        $program->participant_amount = $request->participant_amount;
        $program->year = $request->year;
        $program->month = $request->month;
        $program->start_day = $request->start_day;
        $program->start_time = $request->start_time;
        $program->campus_name = $request->campus_name;
        $program->block_name = $request->block_name;
        $program->block_number = $request->block_number;
        $program->room_number = $request->room_number;
        $program->save();

        return redirect('educationalProgramList');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Eduprogram::find($id);
        $program->delete();
        return redirect('educationalProgramList');

        //
    }
}
