@extends('layouts.form')

@section('content')
<!-- Material form subscription -->
<div class="container">
    <div class="card">

        <h5 class="card-header white-text text-center py-4 rgba-purple-strong">
            <strong>Vehicle Registration</strong>
        </h5>

        <!--Card content-->
        <div class="card-body">

            <!-- Form -->
            <form method="POST" enctype="multipart/form-data" action="{{route('Vehicle.store')}}">
                @csrf
                <!-- Name -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="name">Staff Name</label></div>
                    <div class="col-md-6"><input type="text" id="name" class="form-control"
                            placeholder="{{ Auth::user()->name }}" disabled></div>
                </div>

                <!-- E-mail -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="username">Staff No.</label></div>
                    <div class="col-md-6"><input type="text" id="username" class="form-control"
                            placeholder="{{ Auth::user()->username }}" disabled></div>
                </div>

                <!-- Vehicle brand -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="brand">Brand</label></div>
                    <div class="col-md-6"><select id="brand" class="form-control" name="brand"
                            onchange="populate(this.id,'model')">
                            <option value="">Select Brand</option>
                            <option value="Honda">Honda</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Perodua">Perodua</option>
                            <option value="Proton">Proton</option>
                            <option value="BMW">BMW</option>
                        </select></div>
                </div>

                <!-- Vehicle model -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="model">Model</label></div>
                    <div class="col-md-6"><select id="model" class="form-control" name="model"></select></div>
                </div>

                <!-- Vehicle color -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="color">Colour</label></div>
                    <div class="col-md-6">
                        <div class="colorPickSelector border rounded mb-0">choose</div>
                        <input type="hidden" id="carcolour" value="" name="color">
                    </div>
                </div>
                
                <!-- IC number -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="license">Identification number</label></div>
                    <div class="col-md-6 col-form-label input-group">
                        <div class="custom-file">
                            <input type="file" class=" custom-file-input" name="icnum">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label class="custom-file-label" for="icnum">Choose file</label>
                        </div>
                    </div>
                </div>


                <!-- License number -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="license">License number</label>
                    </div>
                    <div class="col-md-6 col-form-label input-group">
                        <div class="custom-file">
                            <input type="file" class=" custom-file-input" name="license">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label class="custom-file-label" for="license">Choose file</label>
                        </div>
                    </div>
                </div>



                <!-- Plate number -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="platenumber">Plate number</label></div>
                    <div class="col-md-6"><input type="text" id="platenumber" name="platenumber" class="form-control">
                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn white-text btn-rounded btn-block z-depth-0 my-4 waves-effect rgba-purple-strong"
                    type="submit">Register</button>

            </form>
            <!-- Form -->

            <h3>
                <center>Disclaimer</center>
            </h3>
            <hr>
            <h5>For every registration, a fee of RM3 will be deducted from your salary.</h5>
        </div>
    </div>
</div>
<!-- Material form subscription -->
@endsection
