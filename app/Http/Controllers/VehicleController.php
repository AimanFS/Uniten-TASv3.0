<?php

namespace App\Http\Controllers;

use Image;
use Auth;
use App\Attendance;
use App\Vehicle;
use App\Department;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $this->validate($request,[
            // 'brand' => ['required', 'string', 'max:255'],
            // 'model' => ['required', 'string', 'max:25'],
            // 'color' => ['required', 'string', 'max:255'],
            'ic' => ['required', 'string','min:12', 'max:12'],
            'license' => ['required', 'string', 'regex:/([0-9]){8}/'],
            // 'icpic' => ['required'],
            // 'licensepic' => ['required'],
            // 'licenseexpiry' => ['required'],
            // 'platenumber' => ['required'],
        ],
            [
                'ic.min' => 'IC must have 12 numbers.',
                'ic.max' => 'IC must have 12 numbers.',
                'license.regex' => 'License must have 8 numbers.'
        ]);
        //to retrieve ic file
        if($request->hasFile('icpic')){
            $icfile = $request->file('icpic')->getClientOriginalName();
            $filename = pathinfo($icfile, PATHINFO_FILENAME);
            $extension = $request->file('icpic')->getClientOriginalExtension();
            $icupload = $filename.'.'.$extension;
            $path = 'identifications';
            $icpic = $request->file('icpic')->move($path, $icupload);
            
        }

        //to retrieve license file
        if($request->hasFile('licensepic')){
            $licensefile = $request->file('licensepic')->getClientOriginalName();
            $filename = pathinfo($licensefile, PATHINFO_FILENAME);
            $extension = $request->file('licensepic')->getClientOriginalExtension();
            $licenseupload = $filename.'.'.$extension;
            $path = 'licenses';
            $licensepic = $request->file('licensepic')->move($path,  $licenseupload);
        }

        $platenumber = str_replace(' ', '', $request->platenumber);

        $vehicles = Vehicle::insert([
            "brand" => $request->brand,
            "model" => $request->model,
            "color" => $request->color,
            "ic" => $request->ic,
            "license" => $request->license,
            "icpic" => $icpic,
            "licensepic" => $licensepic,
            "licenseexpiry" => $request->licenseexpiry,
            "address" => $request->address,
            "platenumber" =>  strtoupper($platenumber),
            "staff_id" => Auth::user()->id,
            "state" => 0,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" =>  date('Y-m-d H:i:s'),
        ]);

        Alert::success('Vehicle registered!', 'The vehicle has been registered!');
        return redirect()->action('VehicleController@index')->with('success', 'Vehicle registered.');
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
        $this->validate($request,[
            // 'brand' => ['required', 'string', 'max:255'],
            // 'model' => ['required', 'string', 'max:25'],
            'color' => ['string', 'max:255'],
            // 'ic' => ['required', 'string','min:12', 'max:12'],
            'license' => ['string', 'regex:/([0-9]){8}/'],
            // 'icpic' => ['required'],
            //'licensepic' => ['required'],
            // 'licenseexpiry' => ['required'],
            // 'address' => ['required'],
            // 'platenumber' => ['required'],

        ]);
        //to retrieve license file
        if($request->hasFile('licensepic')){
            $licensefile = $request->file('licensepic')->getClientOriginalName();
            $filename = pathinfo($licensefile, PATHINFO_FILENAME);
            $extension = $request->file('licensepic')->getClientOriginalExtension();
            $licenseupload = $filename.'.'.$extension;
            $path = 'licenses';
            $licensepic = $request->file('licensepic')->move($path,  $licenseupload);
        }

        $vehicle = Vehicle::where('id', $id)->first()->update([
            'color' => $request->input('color'),
            'license' => $request->input('license'),
            'licensepic' => $licensepic,
            'licenseexpiry' => $request->input('licenseexpiry'),
            'address' => $request->input('address'),
        ]);
        //dd($vehicle);
        Alert::success('Vehicle information updated!', 'Your new vehicle information has been saved.');
        return redirect()->action('VehicleController@index')->with('success', 'Vehicle information updated!');
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

        Alert::toast('Vehicle deleted!', 'The vehicle has been deleted.');

        return redirect()->back()->with('toast', 'Vehicle deleted!');
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
            $filename = $avatar->getClientOriginalName();
            Image::make($avatar)->resize(300,300)->save(public_path('/images/' . $filename));
            $user = Auth::user();
            $queryavatar = User::where('avatar', '==', $avatar);
            if($queryavatar != $filename){
                $user->avatar = $filename;
                $user->save(); 
            }else{
                Alert::error('Picture not changed!', 'New picture is currently the same.');
            }
            
           
        }
        Alert::success('Record Updated!', 'Your record has been updated.');
        return redirect('/home')->with('success', 'Record updated!');
    }
}
