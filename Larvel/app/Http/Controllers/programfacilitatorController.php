<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Programsfacilitator;
use App\Models\Facilitatorsandparticipant;
use Illuminate\Support\Facades\DB;




class programfacilitatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return Pr
        // return Programsfacilitator::all();
         $members =  DB::table('facilitatorsandparticipants')
        ->join('programsfacilitators', 'facilitatorsandparticipants.id', '=', 'programsfacilitators.facilitator_id')
        ->select('facilitatorsandparticipants.*')
        ->get();
        $path = 'facilitator';
        return view('ListfacilitatorAndParticipant', compact('members', 'path'));
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
        $facilitator = Facilitatorsandparticipant::find($id);
        return view('editFacilitator', compact('facilitator'));
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
        $facilitator_participant = Facilandpart::find($id);
        // return $request->last_name;
        $facilitator_participant->name = $request->name;
        $facilitator_participant->last_name = $request->last_name;
        $facilitator_participant->phone_number = $request->phone_number;
        $facilitator_participant->email = $request->email;
        $facilitator_participant->gender = $request->gender;
        $facilitator_participant->office_campus = $request->office_campus;
        $facilitator_participant->office_building = $request->office_building;
        $facilitator_participant->office_department = $request->office_department;
        $facilitator_participant->office_position = $request->office_position;
        $facilitator_participant->office_position_category = $request->office_position_category;
        if ( $request->educational_rank != null) {
            $facilitator_participant->educational_rank = $request->educational_rank;
        }
        if ($request->password == $request->password_confirm) {
            $facilitator_participant->password = $request->password;
        }
        $facilitator_participant->save();
        return redirect('facilitatorList');

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
        $deleteFacilitator = Facilandpart::find($id);
        $deleteFacilitator->delete();
        return redirect('facilitatorList');
    }
}
