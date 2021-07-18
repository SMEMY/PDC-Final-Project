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
            'image' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
      
        foreach($request->file('image') as $photo)
        {
            if( !empty( $photo ) && is_uploaded_file( $photo ) )
            {     
                echo $imageName = time().'.'.$photo->extension();
                echo "<br>"; 
                $photo->storeAs('public/images', $imageName);
                sleep(1);   
                $imageSave = new Photo;
                $imageSave->program_id = $request->program_id;
                $imageSave->path = $imageName;
                $imageSave->save();
            }
            else{
                echo "error!";
            }
        }
        return redirect('pdcProgramInfo/'.$request->program_id);
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
        $programID=$id;
        return view('program-photo', compact('programID'));
        
        return "i am photo!";
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
