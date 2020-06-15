<?php

namespace App\Http\Controllers;

use App\User;
use App\Vehicle;
use Auth;
use App\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $staff = Auth::user()->id;
        $vehicles = Vehicle::where('staff_id', $staff)->with('staff')->orderBy('created_at','desc')->paginate(4);
        $attendance = Attendance::with('vehicle')->where('staff_id', $staff)->orderBy('created_at','desc')->paginate(4);
        //return($attendance);
        return view ('attendance')->with('vehicle', $vehicles)->with('attendance', $attendance);
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
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    public function violationtype()
    {
        $id = Auth::id();
        $staff = User::with('vehicle','department')->where('id', '!=', $id)->get();
        $attendance = Attendance::with('vehicle','staff')->paginate(10);

        //return ($attendance);
        return view('adminviolation')->with('attendance', $attendance);
    }
}
