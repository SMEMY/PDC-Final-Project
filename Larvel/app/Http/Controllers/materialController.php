<?php

namespace App\Http\Controllers;
use App\Models\Material;
use Illuminate\Support\Facades\DB;

use App\Models\Program;
use Illuminate\Http\Request;
use File;

use Illuminate\Support\Facades\Storage;
// use Storage;
class materialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "material ";
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
        
        $request->validate([
            'materials' => 'required',
            'materials.*' => 'mimes:png,jpg,jpeg,mp4,pdf,docx,doc,docm,rtf,txt,pptx,pptm,ppt,xlsx,xlsm,xlsb,xltx,gif,csv,mp3,m4a,mkv,avi,wmv,mov|max:1048576',
            // 'file_name' => 'required',
            'file_name.*' => 'required|string|max:20',
            // 'file_type' => 'required',
            'file_type.*' => 'required|string|in:آډیو,وډیو,انځور,کتاب,لکچر',
        ]);
        $index = 0;
        foreach($request->file('materials') as $material)
        {     
                if(!empty($request->file_name[$index]) && !empty($request->file_type[$index]))
                {
                    // return "slakdj";
                    $fileName = time().'.'.$material->extension();
                    $kb = $material->getSize() / 1024;
                    $mb = $kb / 1024;
                    $gb = $mb / 1024;
                    $material->storeAs('public/programFiles', $fileName);
                    sleep(1);   
                    $fileSave = new Material;
                    $fileSave->name = $request->file_name[$index];
                    $fileSave->type = $request->file_type[$index];
                    $fileSave->path = $fileName;
                    $fileSave->size =  round($mb, 2);
                    $fileSave->extension =  $material->extension();
                    $fileSave->program_id = $request->program_id;
                    $fileSave->save();
                    $index++;
                }
                elseif(empty($request->file_name[$index])){
                    return back()->with('warn', "د فایل نوم باید وجود ولري!");
                }
                elseif(empty($request->file_type[$index]))
                {
                    return back()->with('warn', "د فایل ډول باید وجود ولري!");
                }
        }
        return redirect('pdcProgramInfo/'.$request->program_id)->with('program_materials_added', "پروګرام اړونده فایلونه په کامیابۍ سره سیسټم ته داخل کړل سوه!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //
        // return $request->path()
        if($request->path() === 'storeMaterials/'.$id)
        {
            $program_id = $id;
            return view('pdc-add-programs-materials', compact('program_id'));

        }
        elseif($request->path() === 'materials/'.$id)
        {
            $program_id = $id;
            // return $program_id;
            $programMaterials = Program::with('getMaterials')->find($id);
            $programMaterialsCheck = DB::table('materials')->where('program_id', $id)->get();


            if(count($programMaterialsCheck) !== 0 )
            {
                return view('files-download', compact('programMaterials', 'program_id'));
            }
            else{
                return back()->with('warn', 'د یاد پروګرام لپاره تر اوسه فایلونه ندي اضافه سوي سیسټم کي !');
            }
        }
        elseif($request->path() === 'facilitatorMaterials/'.$id)
        {
            $program_id = $id;
            return view('facilitator-programs-materials', compact('program_id'));
        }
        elseif($request->path() === 'downloadMaterial/'.$id)
        {
            // return "hi";
            return Storage::download('public/programFiles/'.$id);
            // return Storage::download('public/programFiles/'.$id, $name, $headers);
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
    public function destroy(Request $request, $id)
    {  
        
       
        // $deletematerial->delete();
        // return redirect('materials/'.$request->program_id);
        // return $id;
        Storage::delete('public/programFiles/'.$id);
        $delete = Material::where('path', $id)->get();
        if($delete->program_id === $request->program_id)
        {
            $delete->delete();
        }
        else{
            return back()->with('warn', " یاد فایل چي تاسي غواړی  له منځه یوسی پدې پروګرام پوري اړه نلري!");
        }
         $check = DB::table('materials')->where('program_id',$request->program_id)->get();
        if(count($check) === 0)
        {
            return redirect('pdcProgramInfo/'.$request->program_id)->with('success', "د یاد پروګرام ټوله فایلونه له سیسټم څخه له منځه ولاړ!");;
        }
        else{
            return back()->with('success', "یاد فایل له سیسټم څخه له منځه ولاړ!");
        }
    }


}
