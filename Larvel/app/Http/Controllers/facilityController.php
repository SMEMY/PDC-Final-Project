<?php

namespace App\Http\Controllers;

use App\Models\Facility;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class facilityController extends Controller
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
        // return "sdfsd";
        $request->validate([
            'facility.*' => 'bail|required|max:100',
        ]);
        for ($index = 0; $index < count($request->facility); $index++) {
            $facility = new Facility;
            $facility->facility = $request->facility[$index];
            $facility->program_id = $request->program_id;
            $facility->save();
        }
        return redirect('admin/pdcProgramInfo/' . $request->program_id)->with('program_part_added', "پروګرام اړونده سهولتونه په کامیابۍ سره سیسټم ته داخل کړل سوه!");
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
            return view('admin.pdc-program-facility', compact('programID'));
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
