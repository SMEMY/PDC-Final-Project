<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Programsfacilitator;
use App\Models\Programsparticiapant;
use App\Models\Photo;

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
        ->distinct()
        ->get();
        // return DB::table('facilitatorsandparticipants')->groupBy('phone_number')->having('Phone_number', '!=', '0008343043')->get();
        $path = 'facilitator';
        $searchPath = '/searchFacilitator';
        return view('pdc-list-all-member', compact('members', 'path', 'searchPath'));
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
        if($request->path() === 'searchFacilitator'){
            $members = DB::table('facilitatorsandparticipants')
            ->join('programsfacilitators', 'facilitatorsandparticipants.id', '=', 'programsfacilitators.facilitator_id')
            ->select('facilitatorsandparticipants.*')
            ->where($request->search_type, $request->search_content)
            ->get();
           $path = 'facilitator';
           $searchPath = '/searchFacilitator';
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
        // return "asdfasdf";
        if($request->path() === 'facilitatorProfile/'.$id)
        {
            $userProfile = DB::table('facilitatorsandparticipants')
            ->join('programsfacilitators', 'facilitatorsandparticipants.id', '=', 'programsfacilitators.facilitator_id')
            ->select('facilitatorsandparticipants.*')
            ->where('facilitatorsandparticipants.id', $id)
            ->get();
            $name = 'تسهیلونکی';
            $path = 'facilitatorList';
            $user_request = 'facilitator';
            return view('pdc-user-info', compact('userProfile', 'name', 'path', 'user_request'));
        }
        elseif($request->path() === 'facilitatorProfileForProgram/'.$id)
        {   

            $userProfile =  DB::table('facilitatorsandparticipants')
            ->join('programsfacilitators', 'facilitatorsandparticipants.id', '=', 'programsfacilitators.facilitator_id')
            ->select('facilitatorsandparticipants.*')
            ->where('programsfacilitators.program_id', $id)
            ->get();
            $name = 'تسهیلونکی';
            $program_id = $id;
            if(count($userProfile) !== 0)
            {
                return view('pdc-program-user-info', compact('userProfile', 'name', 'program_id'));
            }
            else{
                return back()->with('warn', "د پروګرام لپاره تر اوسه تسهیلونکي ندی اضافه کړل سوی!");
            }
        }
         //facilitatorEnrolledPrograms
        elseif($request->path() === 'facilitatorEnrolledPrograms/'.$id)
        {
          $enrolledPrograms = DB::table('programs')
         ->join('programsfacilitators', 'programs.id', '=', 'programsfacilitators.program_id')
         ->select('programs.*')
         ->where('programsfacilitators.facilitator_id','=' ,$id)
         ->get();
         $rec = DB::table('programsfacilitators')->where('programsfacilitators.facilitator_id', $id)->select('program_id')->get();
         $programsID = array();
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
       
        elseif(0){

        }

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
        if($request->path() === 'facilitatorList/'.$id."/edit")
        {
        $member = Facilitatorsandparticipant::find($id);
        $path = 'facilitatorList';
        return view('pdc-edit-member', compact('member', 'path'));
        }
        elseif($request->path() === 'facilitatorProfileForProgram/'.$id."/edit")
        {
            $member = Facilitatorsandparticipant::find($id);
            $program_id =  DB::table('facilitatorsandparticipants')
            ->join('programsfacilitators', 'facilitatorsandparticipants.id', '=', 'programsfacilitators.facilitator_id')
            ->select('programsfacilitators.program_id')
            ->where('programsfacilitators.facilitator_id', $id)
            ->get();
            $path = 'facilitatorProfileForProgram';
        return view('pdc-edit-member', compact('member', 'program_id', 'path'));
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
        //
        $facilitator_participant = Facilitatorsandparticipant::find($id);
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
        if($request->path() === 'facilitatorList/'.$id)
        {
             return redirect('facilitatorList');
        }
        elseif($request->path() === 'facilitatorProfileForProgram/'.$id){
            return redirect('facilitatorProfileForProgram/'.$request->program_id);

        }
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->path() === 'deleteFacilitatorForProgram/'.$id)
        {
            // return $id;
            Programsfacilitator::where([['facilitator_id', $id], ['program_id', $request->program_id]])->delete();
            $check =  Programsfacilitator::where('program_id', $request->program_id)->get();
            if(count($check) != 0)
            {
                return back()->with('facilitator_deleted', "د یاد پروګرام تسهیلونکی له سیسټم څخه پاک کړل سوه!");
            }
            else
            {
                return redirect('pdcProgramInfo/'.$request->program_id)->with('all_facilitator_deleted', "د یاد پروګرام ټوله تسهیلونکي له سیسټم څخه پاک کړل سوه!");
            }
        }
        else{
            $deleteFacilitator = Programsfacilitator::where('facilitator_id', $id)->delete();
            return redirect('facilitatorList');
        }

    //    $deleteParticipant = Programsfacilitator::where('facilitator_id', $id)->get();
    //     $deleteParticipant->delete();
    //     return redirect('facilitatorList');
    }
}
