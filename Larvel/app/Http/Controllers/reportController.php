<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

class reportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() === 'admin/monthlyReport') {
                $countPrograms = 0;
                $countEduPrograms = 0;
                return view('admin.pdc-program-monthly-report-test', compact('countPrograms', 'countEduPrograms'));
            } elseif ($request->path() === 'admin/quarterReport') {
                // return "quarter";
                $countPrograms = 0;
                $countEduPrograms = 0;

                return view('admin.pdc-program-quarter-report', compact('countPrograms', 'countEduPrograms'));
            } elseif ($request->path() === 'admin/manualReport') {
                return view('admin.pdc-program-manual-report');
            }
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
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() == 'admin/monthlyReport') {
                $programs = DB::table('programs')
                    ->whereYear('start_date', $request->year)
                    ->wheremonth('start_date', $request->month)
                    ->select('programs.*')
                    ->get();
                $eduPrograms = DB::table('eduprograms')
                    ->whereYear('date', $request->year)
                    ->wheremonth('date', $request->month)
                    ->select('eduprograms.*')
                    ->get();
                $countPrograms =  count($programs);
                $countEduPrograms =  count($eduPrograms);
                if (count($programs) === 0 && count($eduPrograms) === 0) {
                    return back()->with('not-report-found', 'دا میاشت کي هیڅ پروګرام ندی رامنځته سوی!');
                }
                return view('admin.pdc-program-monthly-report-test', compact('programs', 'countPrograms', 'eduPrograms', 'countEduPrograms'));
            } elseif ($request->path() == 'admin/quarterReport') {
                return "skdfhsdkjfhsadfa";
            }
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
