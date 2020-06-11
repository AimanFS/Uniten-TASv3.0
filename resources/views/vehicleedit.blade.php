@extends('layouts.form')

@section('content')
<!-- Material form subscription -->
<div class="container">
    <div class="card">

        <h5 class="card-header white-text text-center py-4 rgba-purple-strong">
            <strong>Vehicle Information Update</strong>
        </h5>

        <!--Card content-->
        <div class="card-body">

            <!-- Form -->
            <form method="POST" enctype="multipart/form-data" action="/Vehicle/{{$vehicle->id}}">
                {{ method_field('PUT') }}
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
                    <div class="col-md-6"><input type="text" id="username" class="form-control"
                        placeholder="{{$vehicle->brand}}" disabled></div>
                </div>


                <!-- Vehicle model -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="model">Model</label></div>
                    <div class="col-md-6"><input type="text" id="username" class="form-control"
                        placeholder="{{$vehicle->model}}" disabled></div>
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
                        <input type="text" id="username" class="form-control"
                        placeholder="{{$vehicle->icnum}}" disabled></div>
                    </div>


                <!-- License number -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="license">License number</label>
                    </div>
                    <div class="col-md-6 col-form-label input-group">
                        <input type="text" id="username" class="form-control"
                        placeholder="{{$vehicle->license}}" disabled></div>
                    </div>


                <!-- Plate number -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="platenumber">Plate number</label></div>
                    <div class="col-md-6"><input type="text" id="username" class="form-control"
                        placeholder="{{$vehicle->platenumber}}" disabled></div>
                </div>
               
                <!-- Sign in button -->
                <button class="btn white-text btn-rounded btn-block z-depth-0 my-4 waves-effect rgba-purple-strong"
                    type="submit">Update Vehicle</button>

            </form>
            <!-- Form -->

        </div>
    </div>
</div>
<!-- Material form subscription -->
@endsection
