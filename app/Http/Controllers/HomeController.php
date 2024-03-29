<?php

namespace App\Http\Controllers;

use Auth;
use App\Attendance;
use App\Vehicle;
use App\Department;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        //$department = Department::all();
        $id = Auth::id();
        $department_id = Auth::user()->department_id;
        $match = ['is_admin' => '0', 'department_id' => $department_id];
        $staffs = User::with('vehicle','department', 'attendance')->where($match)->paginate(6);
        //return($staffs);
        return view('adminHome',compact('staffs'));
    }

}
