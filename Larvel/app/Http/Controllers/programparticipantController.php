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
        ->distinct()
        ->get();
        $searchPath = '/searchParticipant';
        $path = 'participant';
        $page = 'د پروګرامونو ګډونوال';

        return view('pdc-list-all-member', compact('members', 'path', 'searchPath', 'page'));
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
        
        if($request->path() === 'searchParticipant'){
            $members = DB::table('facilitatorsandparticipants')
            ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
            ->select('facilitatorsandparticipants.*')
            ->where($request->search_type, $request->search_content)
            ->get();
            $path = 'particiapnt';
            $searchPath = '/searchParticipant';
            return view('ListfacilitatorAndParticipant', compact('members', 'path', 'searchPath'));
         }
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
        if($request->path() === 'admin/participantProfile/'.$id)
        {
            $userProfile = DB::table('facilitatorsandparticipants')
            ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
            ->select('facilitatorsandparticipants.*')
            ->where('facilitatorsandparticipants.id', $id)
            ->get();
            $name = 'ګډونوال';
            $path = 'participantList';
            $user_request = 'participant';
            return view('pdc-user-info', compact('userProfile', 'name', 'path', 'user_request'));
        }
        elseif($request->path() === 'admin/specificeProgramParticipants/'.$id)
        {
            $participants = DB::table('facilitatorsandparticipants')
            ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
            ->select('facilitatorsandparticipants.*', 'programsparticipants.program_id')
            ->where('programsparticipants.program_id', $id)
            ->get();
            $programID = $id;
            if(count($participants) !== 0)
            {
                return view('pdc-program-participants-list', compact('participants', 'programID'));
            }
            else{
                return back()->with('warn', "د پروګرام لپاره تر اوسه ګډونوال ندي اضافه کړل سوي!");
            }
        }
        elseif($request->path() === 'programSpecificParticipant/'.$id){
            return "i am login";
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
        
        elseif($request->path() === 'admin/participantEnrolledPrograms/'.$id)
        {
          $enrolledPrograms = DB::table('programs')
         ->join('programsparticipants', 'programs.id', '=', 'programsparticipants.program_id')
         ->select('programs.*')
         ->where('programsparticipants.participant_id','=' ,$id)
         ->get();
         $programsID = array();
         $rec = DB::table('programsparticipants')->where('programsparticipants.participant_id', $id)->select('program_id')->get();
         foreach ($rec as $r)
         {
            array_push( $programsID, $r->program_id);
         }
         $notEnrolledPrograms = DB::table('programs')
         ->select('programs.*')
         ->whereNotIn('id', $programsID)
         ->get();
         return view('pdc-facilitator-participant-enrolled-programs', compact('enrolledPrograms','notEnrolledPrograms'));
 
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
    public function edit(Request $request, $id)
    {
        //

        if($request->path() === 'admin/participantList/'.$id."/edit")
        {
        $member = Facilitatorsandparticipant::find($id);
        $path = 'participant';
        return view('pdc-edit-member', compact('member', 'path'));
        }
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
        $validate = $request->validate([
            'member_name' => 'bail|required|string|max:30',
            'last_name' => 'bail|required|string|max:30',
            'phone_number' => 'bail|required|string|max:13',
            'email' => 'bail|required|email|max:50',
            'gender' => 'bail|required|string|in:نارینه,ښځینه',
            'office_campus' => 'bail|nullable|string|in:کندهار پوهتون',
            'office_building' => 'bail|required|string|in:ساینس,ادبیات,شرعیات,اقتصاد,زراعت,ژورنالیزم,حقوق,ساینس,انجنیري,طب,اداري معاونیت,ریاست مقام,محصلینو چارو معاونیت,تعلیم او تربیه,اداره ئې عامه,کمپیوټر ساینس',
            'office_department' => 'bail|required|string|max:30',
            'office_position' => 'bail|required|string|in:اداري کارمند,ښوونکی,مرستیال,رئیس',
            'office_position_category' => 'bail|required|string|in:اداري,تدریسي,اداري او تدریسي',
            'educational_rank' => 'bail|required_if:office_position_category,=,تدریسي,اداري او تدریسي|string|in:پوهاند,پوهنمل,پوهنیار,پوهایالی',
        ]);
        $facilitator_participant = Facilitatorsandparticipant::find($id);
        // return $request->last_name;
        $facilitator_participant->name = $request->member_name;
        $facilitator_participant->last_name = $request->last_name;
        $facilitator_participant->phone_number = $request->phone_number;
        $facilitator_participant->email = $request->email;
        $facilitator_participant->gender = $request->gender;
        $facilitator_participant->office_campus = $request->office_campus;
        $facilitator_participant->office_building = $request->office_building;
        $facilitator_participant->office_department = $request->office_department;
        $facilitator_participant->office_position = $request->office_position;
        $facilitator_participant->office_position_category = $request->office_position_category;
        $facilitator_participant->educational_rank = $request->educational_rank;
        $facilitator_participant->save();
        return redirect('admin/participantList')->with('member_edited', 'د یاد غړي معلومات په کامیابۍ سره په سیسټم کي اصلاح کړل سو!');
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
            // return $id;
            $check = DB::table('programsparticipants')
            ->where([
                ['programsparticipants.participant_id', $id],
                ['programsparticipants.program_id', $request->program_id]
            ])->get();
            if(count( $check) !== 0){
                $deleteParticipant = DB::table('programsparticipants')
                ->where([
                    ['programsparticipants.participant_id', $id],
                    ['programsparticipants.program_id', $request->program_id]
                ]);
                $deleteParticipant->delete();
                DB::table('attendances')->where('participant_id', $id)->delete();
                $check1 = DB::table('programsparticipants')
                ->where('programsparticipants.program_id', $request->program_id)->get();
                if(count($check1) !== 0)
                {
                    return back()->with('success', "یاد ګډونوال له سیسټم څخه له منځه ولاړ!");
                }
                else{
                    return redirect('pdcProgramInfo/'.$request->program_id)->with('warn', "د یاد پروګرام ټوله ګدونوال له سیسټم څخه پاک کړل سوه!");
                }
            }
            else{
                return back()->with('warn', "یاد کس په پروګرام کي شتون نلري د له منځه وړلو لپاره!");
            }

        }
        elseif($request->paht('admin/participantList/'.$id))
        {
            $deleteParticipant = Facilitatorsandparticipant::find($id);
            $deleteParticipant->delete();
            return redirect('admin/participantList');
        }
    }
}
