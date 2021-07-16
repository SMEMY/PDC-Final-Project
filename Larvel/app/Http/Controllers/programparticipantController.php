<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facilandpart;
use App\Models\Program;
use App\Models\Facilitatorsandparticipant;
use Illuminate\Support\Facades\DB;


class programparticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members =  DB::table('facilitatorsandparticipants')
        ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
        ->select('facilitatorsandparticipants.*')
        ->get();

        $path = 'participant';
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
    public function show(Request $request, $id)
    {
        //
        // return "alskdfjalfkdj";
        if($request->path() === 'specificeProgramParticipants/'.$id)
        {
            $participants = DB::table('facilitatorsandparticipants')
            ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
            ->select('facilitatorsandparticipants.*', 'programsparticipants.program_id')
            ->where('programsparticipants.program_id', $id)
            ->get();
            $programID = $id;

            return view('pdc-program-participants-list', compact('participants', 'programID'));
        }
        elseif($request->path() === 'programSpecificParticipant/'.$id){
            // return "i am login";
            if($request->name !== null && $request->phone_number === null)
            {
                $participants = DB::table('facilitatorsandparticipants')
                ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
                ->select('facilitatorsandparticipants.*', 'programsparticipants.program_id')
                ->where('facilitatorsandparticipants.name', $request->name)
                ->get();
                $programID = $id;
                return view('pdc-program-participants-list', compact('participants', 'programID'));
            }
            elseif($request->phone_number !== null && $request->name == null)
            {
                $participants = DB::table('facilitatorsandparticipants')
                ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
                ->select('facilitatorsandparticipants.*', 'programsparticipants.program_id')
                ->where('facilitatorsandparticipants.phone_number', $request->phone_number)
                ->get();
                $programID = $id;
                return view('pdc-program-participants-list', compact('participants', 'programID'));
            }
            elseif($request->phone_number !== null && $request->name !== null)
            {
                $participants = DB::table('facilitatorsandparticipants')
                ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
                ->select('facilitatorsandparticipants.*', 'programsparticipants.program_id')
                ->where([
                   ['facilitatorsandparticipants.phone_number','=', $request->phone_number],
                   ['facilitatorsandparticipants.name', '=',$request->name]
                    ])
                ->get();
                $programID = $id;
                return view('pdc-program-participants-list', compact('participants', 'programID'));
            }
        }
        else{
            return "no path matched!";
        }
        // return $request->path();
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

        // return $id;
        $participant = Facilitatorsandparticipant::find($id);
        return view('editParticipant', compact('participant'));
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
        return redirect('participantList');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        if($request->page == 'pdc-program-participants-list')
        {
            DB::table('programsparticipants')
            ->where('programsparticipants.participant_id', $request->participant_id)
            ->delete();
            return redirect('specificeProgramParticipants/'.$request->program_id);

        }
        else
        {
            $deleteParticipant = Facilitatorsandparticipant::find($id);
            $deleteParticipant->delete();
            return redirect('participantList');
        }
    }
}
