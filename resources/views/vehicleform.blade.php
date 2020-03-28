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
                    <div class="col-md-6"><select id="color" class="form-control" name="color">
                            <option value="">Select Colour</option>
                            <option value="White">White</option>
                            <option value="Yellow">Yellow</option>
                            <option value="Blue">Blue</option>
                            <option value="Red">Red</option>
                            <option value="Green">Green</option>
                            <option value="Black">Black</option>
                            <option value="Brown">Brown</option>
                            <option value="Azure">Azure</option>
                            <option value="Ivory">Ivory</option>
                            <option value="Teal">Teal</option>
                            <option value="Silver">Silver</option>
                            <option value="Purple">Purple</option>
                            <option value="Navy blue">Navy blue</option>
                            <option value="Pea green">Pea green</option>
                            <option value="Gray">Gray</option>
                            <option value="Orange">Orange</option>
                            <option value="Maroon">Maroon</option>
                            <option value="Charcoal">Charcoal</option>
                            <option value="Aquamarine">Aquamarine</option>
                            <option value="Coral">Coral</option>
                            <option value="Fuchsia">Fuchsia</option>
                            <option value="Wheat">Wheat</option>
                            <option value="Lime">Lime</option>
                            <option value="Crimson">Crimson</option>
                            <option value="Khaki">Khaki</option>
                            <option value="Hot pink">Hot pink</option>
                            <option value="Magenta">Magenta</option>
                            <option value="Olden">Olden</option>
                            <option value="Plum">Plum</option>
                            <option value="Olive">Olive</option>
                            <option value="Cyan">Cyan</option>
                        </select></div>
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
