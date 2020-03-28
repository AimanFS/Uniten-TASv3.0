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
            <form method="POST" action="{{route('Vehicle.store')}}">
@csrf
                <!-- Name -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="name">Staff Name</label></div>
                    <div class="col-md-6"><input type="text" id="name" class="form-control"
                            placeholder="{{ Auth::user()->name }}" disabled></div>
                </div>

                <!-- E-mail -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="username">Staff ID No.</label></div>
                    <div class="col-md-6"><input type="text" id="username" class="form-control"
                            placeholder="{{ Auth::user()->username }}" disabled></div>
                </div>

                <!-- Vehicle brand -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="brand">Brand</label></div>
                    <div class="col-md-6"><input type="text" id="brand" name="brand" class="form-control">
                    </div>
                </div>

                <!-- Vehicle model -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="model">Model</label></div>
                    <div class="col-md-6"><input type="text" id="model" name="model" class="form-control">
                    </div>
                </div>

                <!-- Vehicle color -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="color">Colour</label></div>
                    <div class="col-md-6"><input type="text" id="color" name="color" class="form-control">
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

        </div>
    </div>
</div>
<!-- Material form subscription -->
@endsection
