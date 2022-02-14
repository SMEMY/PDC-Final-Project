<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class photoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        // return count($request->image);
        // return $photos = $request->file('image');
        $request->validate([
            'photo' => 'required',
            'photo.*' => 'mimes:jpeg,jpg,png,gif,csv|max:10240',
          ]);
        // $request->validate([
        //     'photo.*' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        // ]);

        foreach($request->file('photo') as $photo)
        {
                $imageName = time().'.'.$photo->extension();
                $photo->storeAs('public/images', $imageName);
                sleep(1);   
                $imageSave = new Photo;
                $imageSave->program_id = $request->program_id;
                $imageSave->path = $imageName;
                $imageSave->save();
        }
        return redirect('admin/pdcProgramInfo/'.$request->program_id)->with('program_part_added', "پروګرام اړونده تفرقې په کامیابۍ سره سیسټم ته داخل کړل سوه!");
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
        if($request->path() === 'admin/pdcProgramPhoto/'.$id)
        {
            $programID=$id;
            return view('pdc-program-photo', compact('programID'));
        }
        elseif ($request->path() === 'admin/downloadPhoto/'.$id) {
            return Storage::download('public/images/'.$id);
        }
        
        // return "i am photo!";
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
        //
        // return "hahahahmmmmmmmmma";
        // return $id;
        Storage::delete('public/images/'.$id);
        Photo::where('path', $id)->delete();
        // $deletematerial->delete();
        return redirect('admin/pdcProgramInfo/'.$request->program_id);
    }
}
