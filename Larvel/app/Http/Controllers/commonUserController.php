<?php

namespace App\Http\Controllers;

use App\Models\Program;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class commonUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->path() === 'user/register') {
            return view('users.facilitatorParticipantRegisteration');
        }
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
        if ($request->path() == 'user/userEnroledPrograms/' . $id) {
            // return "askdjflkas";
            if (Gate::denies(ability: 'logged-in')) {
                return "no access allowed!";
            }
            $enrolledPrograms = DB::table('programs')
                ->join('role_user', 'programs.id', '=', 'role_user.program_id')
                ->select('programs.*')
                ->where('role_user.user_id', auth()->user()->id)
                ->get();
            $programs = DB::table('role_user')
                ->select('role_user.program_id')
                ->where('role_user.user_id', auth()->user()->id)
                ->get();

            $programs_ids = array();

            foreach ($programs as $program_id) {
                array_push($programs_ids, $program_id->program_id);
            }
            // $notEnrolledPrograms  = DB::table('programs')

            //     // ->join('role_user', 'programs.id', '=', 'role_user.program_id')
            //     ->select('programs.*')
            //     ->whereNotIn('programs.id', $programs_ids)
            //     ->simplePaginate(10);
            $notEnrolledPrograms = Program::whereNotIn('id', $programs_ids)->paginate(5);
            // dd($programs_ids);
            // return $notEnrolledPrograms;
            return view('check.facilitator-participant-enrolled-programs', compact('enrolledPrograms', 'notEnrolledPrograms'));
        } elseif ($request->path() == 'user/enrolledPdcProgramInfo/' . $id) {
            $programs = DB::table('programs')->where('programs.id', $id)->get();
            $results = DB::table('programs')
                ->join('results', 'programs.id', '=', 'results.program_id')
                ->where('programs.id', $id)->get();
            $evaluations = DB::table('programs')
                ->join('evaluations', 'programs.id', '=', 'evaluations.program_id')
                ->where('programs.id', $id)->get();
            $facilities = DB::table('programs')
                ->join('facilities', 'programs.id', '=', 'facilities.program_id')
                ->where('programs.id', $id)->get();

            // return $facilities[0]->facility;
            $materials = DB::table('programs')
                ->join('materials', 'programs.id', '=', 'materials.program_id')
                ->where('programs.id', $id)->get();
            $programs = DB::table('programs')->where('programs.id', $id)->get();
            $programs = DB::table('programs')->where('programs.id', $id)->get();
            $programs = DB::table('programs')->where('programs.id', $id)->get();
            return view('users.facil-part-enroll-program-info', compact('programs', 'results', 'evaluations', 'facilities'));
        } elseif ($request->path() == 'user/materials/' . $id) {
            $programMaterials = Program::with('getMaterials')->find($id);
            $program_id = $id;

            return view('users.files-download', compact('programMaterials', 'program_id'));
        } elseif ($request->path() == 'user/downloadMaterial/' . $id) {
            return Storage::download('public/programFiles/' . $id);
            // return view('users.files-download', compact('programMaterials', 'program_id'));
        } elseif ($request->path() == 'user/viewMaterial/' . $id) {
            $path = 'storage/programFiles/' . $id;
            return view('users.viewFile', compact('path'));
        } elseif ($request->path() == 'user/feedbackAnswer/' . $id) {

            $materials =  DB::table('feedbacks')
                ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
                ->select('feedbacks.id as feedbackFormId', 'fquestionnaires.*')
                ->where([
                    ['feedbacks.program_id', '=', $id],
                    ['fquestionnaires.question_category', '=', 'د ورکشاپ/ټرېنینګ مواد']
                ])
                ->get();
            $facilities =  DB::table('feedbacks')
                ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
                ->select('feedbacks.id', 'fquestionnaires.*')
                ->where([
                    ['feedbacks.program_id', '=', $id],
                    ['fquestionnaires.question_category', '=', 'آسانتیاوي']
                ])
                ->get();
            $locations =  DB::table('feedbacks')
                ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
                ->select('feedbacks.id', 'fquestionnaires.*')
                ->where([
                    ['feedbacks.program_id', '=', $id],
                    ['fquestionnaires.question_category', '=', 'ځاي']
                ])
                ->get();
            $comments =  DB::table('feedbacks')
                ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
                ->select('feedbacks.id', 'fquestionnaires.*')
                ->where([
                    ['feedbacks.program_id', '=', $id],
                    ['fquestionnaires.question_category', '=', 'عمومي نظر']
                ])
                ->get();
            $program_id = $id;
            //
            // $programs = DB::table('programs')->get();
            // return $facilities;
            // $program_id = $id;
            if (count($materials) === 0 && count($facilities) === 0 && count($locations) === 0 && count($comments) === 0) {
                return back()->with('warn', "د یاد سیسټم لپاره تر اوسه پوښتتنلیک سیسټم ته ندی اضافه کړل سوی!");
            }
            if (count($materials) === 0 || count($facilities) === 0 || count($locations) === 0 || count($comments) === 0) {
                return back()->with('warn', "د یاد سیسټم لپاره تر اوسه پوښتتنلیک سیسټم ته ندی اضافه کړل سوی!");
            } else {
                return view('users.pdc-feedback-answer', compact('materials', 'facilities', 'locations', 'comments', 'program_id'));
            }
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
