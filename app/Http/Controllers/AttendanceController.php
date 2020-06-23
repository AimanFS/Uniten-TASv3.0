<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\User;
use App\Vehicle;
use Auth;
use App\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
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

    //violation page for staff
    public function violation()
    {
        $id = Auth::user()->id;
        
        $attendance = Attendance::where('staff_id', $id)->where(function ($query){
            $query->whereTime('timein', '>',Carbon::parse('08:01:00'))->orwhereTime('timeout', '<',Carbon::parse('17:15:00'));})->orderBy('created_at', 'DESC')->with('vehicle','staff')->paginate(5);

        //return ($attendance);
        return view('violation')->with('attendance', $attendance);
    }

    //admin overlooking all violation without approval
    public function violationtype()
    {
        $id = Auth::id();
        $staff = User::with('vehicle','department')->where('id', '!=', $id)->get();
        $department = Auth::user()->department_id;
        $attendance = Attendance::whereHas('staff',function ($query) use ($department){
            $query->where('department_id', $department);
        })->where(function ($query){$query->whereTime('timein', '>',Carbon::parse('08:01:00'))->orwhereTime('timeout', '<',Carbon::parse('17:15:00'));})->where('approve', null)->with('vehicle','staff')->orderBy('created_at', 'DESC')->paginate(10);

        //return ($attendance);
        return view('adminviolation')->with('attendance', $attendance);
    }

    //admin overlooking all violation with approval
    public function violationapprove()
    {
        $id = Auth::id();
        $staff = User::with('vehicle','department')->where('id', '!=', $id)->get();
        $department = Auth::user()->department_id;
        $attendance = Attendance::whereHas('staff',function ($query) use ($department){
            $query->where('department_id', $department);
        })->where(function ($query){$query->whereTime('timein', '>',Carbon::parse('08:01:00'))->orwhereTime('timeout', '<',Carbon::parse('17:15:00'));})->where(function($query){
                $query->where('approve', '=', 'Approved')->orWhere('approve', '=', 'Rejected');
            })->orderBy('created_at', 'DESC')->paginate(10);

        //return ($attendance);
        return view('adminviolationapv')->with('attendance', $attendance);
    }

    //staff add remark
    public function staffremark(Request $request)
    {
        $id = $request->id;
        $attendance = Attendance::with('vehicle','staff')->where('id', $id)->update([
            'remark' => $request->input('remark'),
        ]);
        Alert::info('Remark added!', 'Your remark has been recorded.');

        //return ($attendance);
        return redirect('violation')->with('info');
    }

    //admin approval
    public function adminapproval(Request $request)
    {
        $id = $request->id;
        $attendance = Attendance::with('vehicle','staff')->where('id', $id)->update([
            'approve' => $request->input('approve'),
        ]);

        //return ($attendance);
        Alert::toast('A violation was given an approval!');
        return redirect('admin/violation')->with('toast');
    }
}
