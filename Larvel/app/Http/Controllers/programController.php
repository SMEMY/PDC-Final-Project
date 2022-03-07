<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Result;
use App\Models\Facility;
use App\Models\Agenda;
use App\Models\Evaluation;
use App\Models\Material;
use Carbon\Carbon;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;



class programController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() === 'admin/pdcProgramList') {
                $programs =  Program::orderBy('id', 'desc')->paginate(10);
                $path = '/pdcProgramList';
                return view('admin.pdc-list-all-program', compact('programs', 'path'));
            } elseif ($request->path() === 'admin/addPdcProgram') {
                return view('admin.pdc-add-program');
            } elseif ($request->path() === 'admin/addEduProgram') {
                return view('admin.pdc-add-educational-program');
            }
        }
        // dd('you need to be admin');




        if ($request->path() === 'home') {
            $programs =  Program::orderBy('id', 'desc')->paginate(5);

            return view('users.notenrolled-program', compact('programs'));
        } else {
            return "path not matched!";
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

        // this part is belongs to Program Model
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() === 'admin/searchPdcProgram') {
                // return "alkdfj";
                $request->validate([
                    'search_type' => 'bail|required|string|in:month,year,manager,supporter,sponsor,type,name',
                    'search_content' => 'bail|required',
                ]);
                $path = '/pdcProgramList';
                $programs =  DB::table('programs')->where($request->search_type, $request->search_content)->paginate(10);
                if (count($programs) === 0) {
                    return back()->with('warn_search', 'یاد پروګرام په سیسټم کي ونه موندل سو!');
                } else {
                    // redirect('admin/searchPdcProgram')->with('success_search', 'لاندي ستاسي پلټل سوی پروګرام دی!');
                    return view('admin.pdc-list-all-program', compact('programs', 'path'))->with('success_search', 'لاندي ستاسي پلټل سوی پروګرام دی!');;
                }
                // $path = '/pdcProgramList';
                // $programs =  Program::where($request->search_type, $request->search_content)->get();
                // return view('pdc-list-all-program', compact('programs', 'path'));
            } elseif ($request->path() === 'admin/pdcProgramList') {
                // return "akdsfjaksjflj";
                $validate = $request->validate([
                    'name' => 'bail|required|string|max:100',
                    'type' => 'bail|required|string|in:ورکشاپ,سیمینار,سمفوزیم,کنفرانس',
                    'sponsor' => 'bail|required|string|max:30',
                    'supporter' => 'bail|required|string|max:30',
                    'manager' => 'bail|required|string|max:30',
                    'for' => 'bail|required|string',
                    'facilitator' => 'bail|nullable|string|max:30',
                    'info_mobile_number' => 'bail|required|string|max:13',
                    'participant_amount' => 'bail|required|integer|between:1,1000',
                    'fund' => 'bail|required|integer',
                    'fund_type' => 'bail|required|string|in:افغانۍ,ډالر',
                    'fee_able' => 'bail|required|integer|in:0,1',
                    'fee' => 'bail|integer|required_unless:fee_able,=,1|integer|gte:1',
                    'fee_unit' => 'bail|string|required_if:fee_able,=,1|in:افغانۍ,ډالر',
                    'campus_name' => 'bail|required|string|max:30',
                    'block_name' => 'bail|required|string|max:30',
                    'block_number' => 'bail|required|integer|between:1,30',
                    'room_number' => 'bail|required|integer|between:1,30',
                    'start_date' => 'bail|required|date',
                    'end_date' => 'bail|required|date',
                    // 'start_day' => 'bail|required|integer|between:1,31',
                    // 'end_day' => 'bail|required|integer|between:1,31',
                    // 'start_time' => 'bail|required|date_format:H:i',
                    // 'end_time' => 'bail|required|date_format:H:i',
                    // 'days_duration' => 'bail|required|integer',
                    'program_description' => 'bail|required|string|max:2000',
                    'facility.*' => 'bail|required|max:100',
                    'agenda.*' => 'bail|required|max:100',
                    'result.*' => 'bail|required|max:100',
                ]);
                // return $request->start_date;
                if ($request->fee_able == 1) {
                    // return "lsdflds";
                    $validate = $request->validate([
                        'fee' => 'bail|integer|required',
                        'fee_unit' => 'bail|string|required|in:افغانۍ,ډالر',
                    ]);
                }
                // return $request->start_date;
                $start = Carbon::parse($request->input('start_date'));
                $end = Carbon::parse($request->input('end_date'));
                $addProgram = new Program;
                $addProgram->name = $request->name;
                $addProgram->type = $request->type;
                $addProgram->sponsor = $request->sponsor;
                $addProgram->supporter = $request->supporter;
                $addProgram->manager = $request->manager;
                $addProgram->info_mobile_number = $request->info_mobile_number;
                $addProgram->facilitator = $request->facilitator;
                $addProgram->participant_amount = $request->participant_amount;
                $addProgram->fund = $request->fund;
                $addProgram->fund_type = $request->fund_type;
                $addProgram->fee_able = $request->fee_able;
                $addProgram->fee = $request->fee;
                $addProgram->for = $request->for;
                $addProgram->fee_type = $request->fee_unit;
                $addProgram->program_description = $request->program_description;
                $addProgram->facilitator_code = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
                $addProgram->participant_code = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
                // $addProgram->year = $request->year;
                $addProgram->start_date = $request->start_date;
                $addProgram->end_date = $request->end_date;
                $addProgram->days_duration = $start->diffInDays($end);
                // $addProgram->hours_duration = 12;
                $addProgram->campus_name = $request->campus_name;
                $addProgram->block_name = $request->block_name;
                $addProgram->block_number = $request->block_number;
                $addProgram->room_number = $request->room_number;
                $addProgram->save();

                for ($index = 0; $index < count($request->result); $index++) {
                    $result = new Result;
                    $result->result = $request->result[$index];
                    $result->program_id = $addProgram->id;
                    $result->save();
                }
                for ($index = 0; $index < count($request->agenda); $index++) {
                    $result = new Agenda;
                    $result->agenda = $request->agenda[$index];
                    $result->program_id = $addProgram->id;
                    $result->save();
                }
                for ($index = 0; $index < count($request->facility); $index++) {
                    $result = new Facility;
                    $result->facility = $request->facility[$index];
                    $result->program_id = $addProgram->id;
                    $result->save();
                }
                // return "done";
                // $request->session()->put('program_added', "پروګرام يه کامیابۍ سره سیسټم ته اضافه سو!");
                return back()->with('program_added', "پروګرام په کامیابۍ سره سیسټم ته اضافه سو!");
            }
        } else {
            dd('you need to be admin');
        }



        // $add_program->name =
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        // comAllPrograms
        //participantEnrolledPrograms
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() == 'admin/pdcProgramInfo/' . $id) {
                $programs = Program::with('getFacilities', 'getResults', 'getEvaluations', 'getAgendas', 'getPhotos',)->find($id);
                $program_id = $id;
                $programID = $id;
                // return $programs->start_date;
                // return Carbon::parse($programs->start_date)->format('M');

                return view('admin.pdc-program-info', compact('programs', 'program_id', 'programID'));
            }
        }

        if ($request->path() === 'user/programs/' . $id) {
            $programs = Program::with('getFacilities', 'getResults')->find($id);
            return view('users.not-enreolled-program-info', compact('programs'));
        } elseif ($request->path() == 'user/programEnrolment/' . $id) {
            return view();
        } elseif ($request->path() == 'enrolledPdcProgramInfo/' . $id) {
            $programs = Program::with('getFacilities', 'getResults', 'getEvaluations')->find($id);

            return view('facil-part-enroll-program-info', compact('programs'));
        } else {
            return "path not found!";
        }
        // else {
        //     dd('you need to be admin');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if (Gate::denies(ability: 'logged-in')) {
            return "no access allowed!";
        }
        //
        if ($request->path() === 'admin/pdcProgramList/' . $id . "/edit") {
            // return "i am edit.";
            $editProgram = Program::with('getResults', 'getFacilities', 'getAgendas', 'getEvaluations')->find($id);
            return view('admin.pdc-edit-program', compact('editProgram'));
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
        if (Gate::denies(ability: 'logged-in')) {
            return "no access allowed!";
        }
        //
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() === 'admin/pdcProgramList/' . $id) {
                // return "i am edit.";
                // return $request->fee_able;
                $validate = $request->validate([
                    'name' => 'bail|required|string|max:100',
                    'type' => 'bail|required|string|in:ورکشاپ,سیمینار,سمفوزیم,کنفرانس',
                    'sponsor' => 'bail|required|string|max:30',
                    'supporter' => 'bail|required|string|max:30',
                    'manager' => 'bail|required|string|max:30',
                    'facilitator' => 'bail|nullable|string|max:30',
                    'info_mobile_number' => 'bail|required|string|max:13',
                    'participant_amount' => 'bail|required|integer|between:1,1000',
                    'fund' => 'bail|required|integer',
                    'fund_type' => 'bail|required|string|in:افغانۍ,ډالر',
                    'fee_able' => 'bail|required|integer|in:0,1',
                    // 'fee' => 'bail|integer|required_unless:fee_able,=,1|integer|gte:1',
                    // 'fee_unit' => 'bail|string|required_if:fee_able,=,1|in:افغانۍ,ډالر',
                    'campus_name' => 'bail|required|string|max:30',
                    'block_name' => 'bail|required|string|max:30',
                    'block_number' => 'bail|required|integer|between:1,30',
                    'room_number' => 'bail|required|integer|between:1,30',
                    'start_date' => 'bail|required|date',
                    'end_date' => 'bail|required|date',
                    // 'start_day' => 'bail|required|integer|between:1,31',
                    // 'end_day' => 'bail|required|integer|between:1,31',
                    // 'start_time' => 'bail|required|date_format:H:i',
                    // 'end_time' => 'bail|required|date_format:H:i',
                    // 'days_duration' => 'bail|required|integer',
                    'program_description' => 'bail|required|string|max:2000',
                ]);
                if ($request->fee_able == 1) {
                    // return ;
                    $validate = $request->validate([
                        'fee' => 'bail|integer|required',
                        'fee_type' => 'bail|string|required|in:افغانۍ,ډالر',
                        'agenda.*' => 'bail|string|required',
                        'facility.*' => 'bail|string|required',
                        'result.*' => 'bail|string|required',
                        'evaluation.*' => 'bail|string|required',
                    ]);
                }
                // if($request->result == null)
                // {
                //     return $request->result."sdlkfjsd";
                // }
                $start = Carbon::parse($request->input('start_date'));
                $end = Carbon::parse($request->input('end_date'));
                $addProgram = Program::with('getResults', 'getFacilities', 'getAgendas', 'getEvaluations')->find($id);
                $addProgram->name = $request->name;
                $addProgram->type = $request->type;
                $addProgram->sponsor = $request->sponsor;
                $addProgram->supporter = $request->supporter;
                $addProgram->manager = $request->manager;
                $addProgram->participant_amount = $request->participant_amount;
                $addProgram->fund = $request->fund;
                $addProgram->info_mobile_number = $request->info_mobile_number;
                $addProgram->fund_type = $request->fund_type;
                $addProgram->fee_able = $request->fee_able;
                $addProgram->fee = $request->fee;
                $addProgram->fee_type = $request->fee_type;
                $addProgram->program_description = $request->program_description;
                $addProgram->start_date = $request->start_date;
                $addProgram->end_date = $request->end_date;
                $addProgram->days_duration = $start->diffInDays($end);

                $addProgram->campus_name = $request->campus_name;
                $addProgram->block_name = $request->block_name;
                $addProgram->block_number = $request->block_number;
                $addProgram->room_number = $request->room_number;
                $addProgram->save();
                if ($request->facility != null) {
                    // this part belongs to Facility Model
                    Facility::where('program_id', $id)->delete();
                    foreach ($request->facility as  $value) {
                        $programFacility = new Facility;
                        $programFacility->facility = $value;
                        $programFacility->program_id = $id;
                        $programFacility->save();
                        // sleep(1);
                    }
                }
                if ($request->agenda != null) {
                    // this part belongs to Agenda Model
                    Agenda::where('program_id', $id)->delete();
                    foreach ($request->agenda as  $value) {
                        $programAgenda = new Agenda;
                        $programAgenda->agenda = $value;
                        $programAgenda->program_id = $id;
                        $programAgenda->save();
                        // sleep(1);
                    }
                }
                if ($request->result != null) {
                    // this part belongs to result Model
                    Result::where('program_id', $id)->delete();
                    foreach ($request->result as  $value) {
                        $programResult = new Result;
                        $programResult->result = $value;
                        $programResult->program_id = $id;
                        $programResult->save();
                        // sleep(1);
                    }
                }

                if ($request->evaluation != null) {
                    // this part belongs to evaluation Model
                    Evaluation::where('program_id', $id)->delete();
                    foreach ($request->evaluation as  $value) {
                        $programEvaluation = new Evaluation;
                        $programEvaluation->evaluation = $value;
                        $programEvaluation->program_id = $id;
                        $programEvaluation->save();
                        // sleep(1);
                    }
                }

                // return "done";
                return redirect('admin/pdcProgramList')->with('program_edited', "پروګرام په کامیابۍ سره سیسټم کي اصلاح کړل سو!");
            }
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
        //
        if (Gate::denies(ability: 'logged-in')) {
            return "no access allowed!";
        }
        // if($request->path() === 'admin/pdcProgramDelete/'.$id){
        //     $deleteProgram = Program::find($id);
        //     $deleteProgram->delete();
        //     return redirect('/pdcProgramList');
        // }
        if ($request->path() === 'admin/pdcProgramList/' . $id) {
            $deleteProgram = Program::find($id);
            $deleteProgram->delete();
            return redirect('/admin/pdcProgramList');
        }
        return $id;
    }
}
