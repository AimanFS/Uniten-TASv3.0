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
            'ic' => ['required', 'string','regex:/^\d{6}-\d{2}-\d{4}$/'],
            'license' => ['required', 'string'],
            // 'icpic' => ['required'],
            // 'licensepic' => ['required'],
            // 'licenseexpiry' => ['required'],
            'platenumber' => ['required', 'unique:vehicles'],
        ],
            [
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

        $this->validate($request,[
            'avatar' => ['required'],
            
        ]);
        
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar'); 
            $filename = $avatar->getClientOriginalName();
            $extension = $request->file('avatar')->getClientOriginalExtension();
            //return $extension;
            if($extension == 'jpeg' || $extension == 'jpg' || $extension == 'gif' || $extension == 'png' || $extension == 'webp'){
                Image::make($avatar)->resize(300,300)->save(public_path('/images/' . $filename));
                $user = Auth::user();
                $user->avatar = $filename;
                $user->save();
                $queryavatar = User::where('avatar', '==', $filename);
                Alert::toast('Picture updated!', 'Your profile picture has been changed.');
                    return redirect('/home')->with('success', 'Record updated!');
            }else{
                Alert::Info('Invalid Format', 'Please use only JPEG, JPG, PNG, GIF or WEBP format');
                    return redirect('/profile')->with('info', 'hajdhsjakd');
            }
        }
    }

    public function updatephoneno(Request $request){
        $this->validate($request,[
            'phoneno' => ['unique:staffs','regex:/(01)[0-9]{7,8}/', 'min:10'],
        ],
            [
                'phoneno.unique' => 'The phone number is already in use.',
        ]);

        $id = Auth::user()->id;
        $phoneno = User::where('id', $id)->first()->update([
            'phoneno' => $request->input('phoneno'),
        ]);
        Alert::toast('Phone number updated!', 'Your phone number has been updated.');
        return redirect('/home')->with('success', 'Phone number updated!');
    }

    public function updatedepartment(Request $request){
        $this->validate($request,[
            'department_id' => ['required'],
        ],
        [
            'department_id.required' => "Select a department",
        ]);

        $id = Auth::user()->id;
        $dpt = Auth::user()->department_id;
        
        if($dpt == $request->get('department_id')){
            //return "sama";
            Alert::info('Same department!', 'You are already in the selected department!');
            return redirect('/profile')->with('info', 'Currently in the department!');
        }else{
            //return "lain";
            $department = User::where('id', $id)->first()->update([
                'department_id' => $request->get('department_id'),
            ]);
            Alert::toast('Department changed!', 'You now belong in a different department!');
            //return $department;
            return redirect('/home')->with('toast', 'Department updated!');
        }
    }

}
