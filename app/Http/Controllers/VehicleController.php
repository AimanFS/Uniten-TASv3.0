<?php

namespace App\Http\Controllers;

use Image;
use Auth;
use App\Attendance;
use App\Vehicle;
use App\Department;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        $vehicles = Vehicle::where('staff_id', $staff)->where("state", 0)->with('staff')->orderBy('created_at','desc')->paginate(3);
        return view ('vehicle')->with('vehicle', $vehicles);
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
        //to retrieve ic file
        if($request->hasFile('icnum')){
            $icfile = $request->file('icnum')->getClientOriginalName();
            $filename = pathinfo($icfile, PATHINFO_FILENAME);
            $extension = $request->file('icnum')->getClientOriginalExtension();
            $icupload = $filename.'.'.$extension;
            $path = 'identifications';
            $ic = $request->file('icnum')->move($path, $icupload);
            
        }

        //to retrieve license file
        if($request->hasFile('license')){
            $licensefile = $request->file('license')->getClientOriginalName();
            $filename = pathinfo($licensefile, PATHINFO_FILENAME);
            $extension = $request->file('license')->getClientOriginalExtension();
            $licenseupload = $filename.'.'.$extension;
            $path = 'licenses';
            $license = $request->file('license')->move($path,  $licenseupload);
        }

        $platenumber = str_replace(' ', '', $request->platenumber);

        $vehicles = Vehicle::insert([
            "brand" => $request->brand,
            "model" => $request->model,
            "color" => $request->color,
            "icnum" => $ic,
            "license" => $license,
            "platenumber" =>  strtoupper($platenumber),
            "staff_id" => Auth::user()->id,
            "state" => 0,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" =>  date('Y-m-d H:i:s'),
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
    public function update(Request $request,$id)
    {
        $vehicle = Vehicle::where('id', $id)->first()->update([
            'color' => $request->input('color'),
        ]);
        //dd($vehicle);
        return redirect()->action('VehicleController@index');
    }

    public function vehicleeditpage($id)
    {
        //dd($id);
        $vehicle = Vehicle::where('id', $id)->first();
        //dd($vehicle);
        return view ('vehicleedit', compact('vehicle'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //$id = $request->id;

        //$vehicle = Vehicle::find($id)->delete();

        // delete related   
        //$vehicle->staff->each->delete();
        //$delete =  $vehicle->delete();
        

        //return redirect()->back();
    }

    public function deletecar(Request $request)
    {
        $id = $request->id;
        $staff = Auth::user()->id;
        $vehicle = Vehicle::where('id', $id)->update(['state' => 1]);

        return redirect()->back();
    }


    public function home(Request $request){
        $staff = Auth::user()->id;
        $vehicles = Vehicle::where('staff_id', $staff)->where("state", 0)->with('staff')->orderBy('created_at','desc')->latest()->take(5)->get();
        $attendance = Attendance::with('vehicle')->where('staff_id', $staff)->orderBy('created_at','desc')->latest()->take(5)->get();
        //return($attendance);

        return view ('home')->with('vehicle', $vehicles)->with('attendance', $attendance);
    }

    public function profile(){
        $department = Department::get();
        return view('profile')->with('department',$department);
    }

    public function updateprofile(Request $request){
        
        $id = Auth::user()->id;
        $department = User::where('id', $id)->first()->update([
            'department_id' => $request->input('department_id'),
            'phoneno' => $request->input('phoneno'),
        ]);

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/images/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save(); 
        }
        return redirect('/profile');
    }
}
     
