<?php

namespace App\Http\Controllers;

use Image;
use Auth;
use App\Vehicle;
use App\Department;
use App\User;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Auth::user()->id;
        //$dpt = Auth::user()->department_id;
        //$department = User::with('department')->where('id', '=', $staff)->get();
        

        $vehicles = Vehicle::where('staff_id', $staff)->with('staff')->get();

        //return $department;
        return view ('vehicle')->with('vehicle', $vehicles);//->with('department', $department);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('vehicleform');
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
        $platenumber = str_replace(' ', '', $request->platenumber);
        $vehicles = Vehicle::insert([
            "brand" => $request->brand,
            "model" => $request->model,
            "color" => $request->color,
            "platenumber" =>  strtoupper($platenumber),
            "staff_id" => Auth::user()->id,
        ]);

        return redirect()->action('VehicleController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }

    public function home(Request $request){
        $staff = Auth::user()->id;
        $vehicles = Vehicle::where('staff_id', $staff)->with('staff')->get();

        return view ('home')->with('vehicle', $vehicles);
    }

    public function profile(){
        return view('profile');
    }

    public function updateprofile(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/images/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save(); 
        }
        return view('profile');
    }
}
