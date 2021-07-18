<?php

namespace App\Http\Controllers;
use App\Models\Material;
use App\Models\Program;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
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
            'materials.*' => 'required',
        ]);
        // return "sdfsd";w
        // return $files = $request->materials;
        // $files = $request->file('materials');
        // echo $request->file_type[0];
        $index = 0;
        foreach($request->file('materials') as $material)
        {     
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
        return redirect('pdcProgramInfo/'.$request->program_id);
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
            return view('facilitator-programs-materials', compact('program_id'));

        }
        elseif($request->path() === 'materials/'.$id)
        {
            $program_id = $id;
            $programMaterials = Program::with('getMaterials')->find($id);
            return view('files-download', compact('programMaterials', 'program_id'));
        }
        elseif($request->path() === 'facilitatorMaterials/'.$id)
        {
            return view('facilitator-programs-materials', compact('program_id'));
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
