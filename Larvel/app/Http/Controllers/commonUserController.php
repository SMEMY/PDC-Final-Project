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
    public function index()
    {
        //
        return "s";
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
            if (Gate::denies(ability: 'logged-in')) {
                return "no access allowed!";
            }
            $enrolledPrograms = DB::table('programs')
                ->join('user_roles', 'programs.id', '=', 'user_roles.program_id')
                ->select('programs.*')
                ->where('user_roles.user_id', $id)
                ->get();
            $programs = DB::table('user_roles')
                // ->join('user_roles', 'programs.id', '=', 'user_roles.program_id')
                ->select('user_roles.program_id')
                ->where('user_roles.user_id', $id)
                ->get();
            $programs_ids = json_decode($programs, true);
            $notEnrolledPrograms  = DB::table('programs')
                ->join('user_roles', 'programs.id', '=', 'user_roles.program_id')
                ->select('programs.*')
                ->whereNotIn('programs.id', $programs_ids)
                ->get();
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
            return view('check.facil-part-enroll-program-info', compact('programs', 'results', 'evaluations', 'facilities'));
        } elseif ($request->path() == 'user/materials/' . $id) {
            $programMaterials = Program::with('getMaterials')->find($id);
            $program_id = $id;

            return view('users.files-download', compact('programMaterials', 'program_id'));
        } elseif ($request->path() == 'user/downloadMaterial/' . $id) {
            return Storage::download('public/programFiles/' . $id);
            // return view('users.files-download', compact('programMaterials', 'program_id'));
        } elseif ($request->path() == 'user/viewMaterial/' . $id) {
            $path = 'storage/programFiles/'.$id;
            return view('users.viewFile', compact('path'));
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
