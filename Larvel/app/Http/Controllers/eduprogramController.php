<?php

namespace App\Http\Controllers;

use App\Models\Eduprogram;
Use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class eduprogramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return "asldfkja";
// return $request->method();
        $programs =  Eduprogram::orderBy('id', 'desc')->get();
        $path = '/educationalProgramList';
        // return $programs;
        return view('pdc-list-all-educational-program', compact('programs', 'path'));
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
        // return $request->path();
        if($request->path() === 'searchEducationalProgram'){
            $request->validate([
                'search_type' => 'bail|required|string|in:year,department,faculty,university,teacher_last_name,teacher_name,teacher_name,type,topic',
                'search_content' => 'bail|required',
            ]);
            $path = '/educationalProgramList';
            $programs =  DB::table('eduprograms')->where($request->search_type, $request->search_content)->get();
            if(count($programs) === 0)
            {
                return back()->with('warn_search', 'یاد پروګرام په سیسټم کي ونه موندل سو!');
            }
            else{
                redirect('searchEducationalProgram')->with('success_search', 'لاندي ستاسي پلټل سوی پروګرام دی!');
                return view('pdc-list-all-educational-program', compact('programs', 'path'));
            }
        }
        else{

            $request->validate([
                'topic' => 'bail|required|string|max:100',
                'type' => 'bail|required|string|in:تقرر,ارتقاء,علمي ترفېع',
                'teacher_name' => 'bail|required|string|max:30',
                'father_name' => 'bail|required|string|max:30',
                'teacher_last_name' => 'bail|required|string|max:30',
                'university' => 'bail|nullable|string|in:کندهار پوهنتون',
                'faculty' => 'bail|required|string|in:کمپیوټر ساینس,انجنیري,حقوق,اداره ئې عامه,ژورنالیزم,اقتصاد,زراعت,شرعیات,ادبیات,ساینس,تعلیم او تربیه',
                'department' => 'bail|required|string|max:30',
                'current_educational_position' => 'bail|required|string|in:پوهاند,پوهنمل,پوهنیار,پوهیالی',
                'achieving_educational_position' => 'bail|required|string|in:پوهاند,پوهنمل,پوهنیار,پوهیالی',
                'participant_amount' => 'bail|required|integer|between:1,200',
                'year' => 'bail|required|integer|between:2017,3000',
                'month' => 'bail|required|integer|between:1,12',
                'start_day' => 'bail|required|integer|between:1,31',
                'start_time' => 'bail|required|date_format:H:i',
                'campus_name' => 'bail|required|string|max:30',
                'block_name' => 'bail|required|string|max:30',
                'block_number' => 'bail|required|integer|between:1,30',
                'room_number' => 'bail|required|integer|between:1,30',
            ]);
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
    
            return back()->with('success', 'یاد پروګرام په کامیابۍ سره سیسټم اضافه کړل سو!');
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
        $program = Eduprogram::find($id);
        return view('pdc-educational-program-info', compact('program'));
        
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
        return view('pdc-edit-educational-program', compact('program'));
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

        $request->validate([
            'topic' => 'bail|required|string|max:100',
            'type' => 'bail|required|string|in:تقرر,ارتقاء,علمي ترفېع',
            'teacher_name' => 'bail|required|string|max:30',
            'father_name' => 'bail|required|string|max:30',
            'teacher_last_name' => 'bail|required|string|max:30',
            'university' => 'bail|nullable|string|in:کندهار پوهنتون',
            'faculty' => 'bail|required|string|in:کمپیوټر ساینس,انجنیري,حقوق,اداره ئې عامه,ژورنالیزم,اقتصاد,زراعت,شرعیات,ادبیات,ساینس,تعلیم او تربیه',
            'department' => 'bail|required|string|max:30',
            'current_educational_position' => 'bail|required|string|in:پوهاند,پوهنمل,پوهنیار,پوهیالی',
            'achieving_educational_position' => 'bail|required|string|in:پوهاند,پوهنمل,پوهنیار,پوهیالی',
            'participant_amount' => 'bail|required|integer|between:1,200',
            'year' => 'bail|required|integer|between:2017,3000',
            'month' => 'bail|required|integer|between:1,12',
            'start_day' => 'bail|required|integer|between:1,31',
            'start_time' => 'bail|required|date_format:H:i',
            'campus_name' => 'bail|required|string|max:30',
            'block_name' => 'bail|required|string|max:30',
            'block_number' => 'bail|required|integer|between:1,30',
            'room_number' => 'bail|required|integer|between:1,30',
        ]);
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
        return redirect('educationalPrograminfo/'.$id)->with('success', 'د یاد پروګرام معلومات په سیسټم کي په کامیابۍ سره تغیر ورکړل سو!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(count(DB::table('eduprograms')->where('id', $id)->get()) === 1)
        {
            $program = Eduprogram::find($id);
            $program->delete();
            return redirect('educationalProgramList')->with('success', 'د یاد پروګرام معلومات له سیسټم څخه په کامیابۍ سره له منځه لاړ!');
        }
        elseif(count(DB::table('eduprograms')->where('id', $id)->get()) === 0)
        {
            return redirect('educationalProgramList')->with('warn', 'یاد پروګرام په سیسټم کي د له منځه وړلو لپاره نسو پیدا!');
        }


        //
    }
}
