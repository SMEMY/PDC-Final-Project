<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Support\Facades\DB;

use App\Models\Program;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Gate;

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
        // return "sljdkfj";
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() == 'admin/storeMaterials') {
                $index = 0;
                // return "sldkfjsdf";
                // return $request->file('materials');
                foreach ($request->file('materials') as $material) {
                    if (!empty($request->file_name[$index]) && !empty($request->file_type[$index])) {
                        // return "slakdj";
                        $fileName = time() . '.' . $material->extension();
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
                    } elseif (empty($request->file_name[$index])) {
                        return back()->with('warn', "?? ???????? ?????? ???????? ???????? ????????!");
                    } elseif (empty($request->file_type[$index])) {
                        return back()->with('warn', "?? ???????? ?????? ???????? ???????? ????????!");
                    }
                }
                return redirect('admin/pdcProgramInfo/' . $request->program_id)->with('program_materials_added', "?????????????? ???????????? ?????????????? ???? ?????????????? ?????? ?????????? ???? ???????? ?????? ??????!");
            }
        } else {
            dd('you need to be admin');
        }

        if (Gate::allows(ability: 'is-facilitator')) {
            if ($request->path() == 'user/storeMaterials') {
                // return "i am store mat";
                $request->validate([
                    'materials' => 'required',
                    'materials.*' => 'mimes:png,jpg,jpeg,mp4,pdf,docx,doc,docm,rtf,txt,pptx,pptm,ppt,xlsx,xlsm,xlsb,xltx,gif,csv,mp3,m4a,mkv,avi,wmv,mov|max:1048576',
                    // 'file_name' => 'required',
                    'file_name.*' => 'required|string|max:20',
                    // 'file_type' => 'required',
                    'file_type.*' => 'required|string|in:????????,????????,??????????,????????,????????',
                ]);
                $index = 0;
                // return "sldkfjsdf";
                // return $request->file('materials');
                foreach ($request->file('materials') as $material) {
                    if (!empty($request->file_name[$index]) && !empty($request->file_type[$index])) {
                        // return "slakdj";
                        $fileName = time() . '.' . $material->extension();
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
                    } elseif (empty($request->file_name[$index])) {
                        return back()->with('warn', "?? ???????? ?????? ???????? ???????? ????????!");
                    } elseif (empty($request->file_type[$index])) {
                        return back()->with('warn', "?? ???????? ?????? ???????? ???????? ????????!");
                    }
                }
                return redirect('user/facilitatorMaterials/' . $request->program_id)->with('program_materials_added', "?????????????? ???????????? ?????????????? ???? ?????????????? ?????? ?????????? ???? ???????? ?????? ??????!");
            }
        } else {
            dd('you need to be facilitator!');
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
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() === 'admin/storeMaterials/' . $id) {
                $program_id = $id;
                return view('admin.pdc-add-programs-materials', compact('program_id'));
            } elseif ($request->path() === 'admin/materials/' . $id) {
                $program_id = $id;
                // return $program_id;
                $programMaterials = Program::with('getMaterials')->find($id);
                $programMaterialsCheck = DB::table('materials')->where('program_id', $id)->get();


                if (count($programMaterialsCheck) !== 0) {
                    return view('admin.files-download', compact('programMaterials', 'program_id'));
                } else {
                    return back()->with('warn', '?? ?????? ?????????????? ?????????? ???? ???????? ?????????????? ?????? ?????????? ?????? ?????????? ???? !');
                }
            } elseif ($request->path() === 'downloadMaterial/' . $id) {
                // return "hi";
                return Storage::download('public/programFiles/' . $id);
                // return Storage::download('public/programFiles/'.$id, $name, $headers);
            } elseif ($request->path() === 'admin/downloadMaterial/' . $id) {
                return Storage::download('public/programFiles/' . $id);
                return $id;
            } elseif ($request->path() === 'admin/viewMaterial/' . $id) {
                // return Storage::download('public/programFiles/' . $id);
                $path = 'storage/programFiles/' . $id;
                return view('admin.viewFile', compact('path'));

                // return $path;
            }
        } else {
            // dd('you need to be admddddin');
        }

        if (Gate::allows(ability: 'is-facilitator')) {
            if ($request->path() === 'user/facilitatorMaterials/' . $id) {
                $program_id = $id;
                $u_role = $request->role_id;
                return view('users.pdc-add-programs-materials', compact('program_id', 'u_role'));
            }
        } else {
            dd('you need to be facilitator!');
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
        // return $request->program_id;
        // return $id;
        if (Gate::allows(ability: 'is-admin')) {
            Storage::delete('public/programFiles/' . $id);
            // return "del";
            $delete = DB::table('materials')->where('materials.path', $id)->get();
            if ($delete[0]->program_id == $request->program_id) {
                DB::table('materials')->where('materials.path', $id)->delete();
            } else {
                return back()->with('warn', " ?????? ???????? ???? ???????? ??????????  ???? ???????? ???????? ?????? ?????????????? ???????? ?????? ????????!");
            }
            $check = DB::table('materials')->where('program_id', $request->program_id)->get();
            if (count($check) === 0) {
                return redirect('admin/pdcProgramInfo/' . $request->program_id)->with('success', "?? ?????? ?????????????? ???????? ?????????????? ???? ?????????? ?????? ???? ???????? ????????!");;
            } else {
                return back()->with('success', "?????? ???????? ???? ?????????? ?????? ???? ???????? ????????!");
            }
        } else {
            dd('you need to be admin');
        }
    }
}
