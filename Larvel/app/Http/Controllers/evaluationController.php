<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class evaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if (Gate::allows(ability: 'is-admin')) {
            $request->validate([
                'program_evaluation.*' => 'bail|required|max:100',
            ]);
            for ($index = 0; $index < count($request->program_evaluation); $index++) {
                $evaluation = new Evaluation;
                $evaluation->evaluation = $request->program_evaluation[$index];
                $evaluation->program_id = $request->program_id;
                $evaluation->save();
            }
            return redirect('admin/pdcProgramInfo/' . $request->program_id)->with('program_part_added', "پروګرام اړونده ارزوني په کامیابۍ سره سیسټم ته داخل کړل سوه!");
        } else {
            dd('you need to be admin');
        }
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
        if (Gate::allows(ability: 'is-admin')) {
            $programID = $id;
            return view('admin.pdc-program-evaluation', compact('programID'));
        } else {
            dd('you need to be admin');
        }
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
    }
}
