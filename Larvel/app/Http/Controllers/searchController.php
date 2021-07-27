<?php

namespace App\Http\Controllers;
use App\Models\Eduprogram;

use Illuminate\Http\Request;

class searchController extends Controller
{
    //
    function searchEduProgram(Request $request)
    {
        return $request->path();
        if($request->path() === 'searchEducationalProgram'){
            $path = '/educationalProgramList';
            return $programs =  Eduprogram::where($request->search_type, $request->search_content)->get();

            view('pdc-list-all-educational-program', compact('programs', 'path'));
        }
    }
}
