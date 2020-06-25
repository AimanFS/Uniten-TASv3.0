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
                    <div class="col-md-6 col-form-label"><label for="color">{{ __('Color') }}</label></div>
                    <div class="col-md-6">
                        <div class="colorPickSelector border rounded mb-0" data-initialcolor="{{$vehicle->color}}">
                            {{ __('Color') }}</div>
                        <input type="hidden" id="carcolour" value="" name="color" class="@error('model')
                        is-invalid @enderror" value="{{ old('color') }}" required autocomplete="color" autofocus>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="ic">IC number</label></div>
                    <div class="col-md-6"><input type="text" id="ic" class="form-control" name="ic"
                            placeholder="{{$vehicle->ic}}" disabled></div>
                </div>

                <!-- IC image -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="icpic">Identity Card</label></div>
                    <div class="col-md-6 col-form-label input-group">
                        <input type="text" id="icpic" class="form-control" placeholder="{{$vehicle->icpic}}" disabled>
                    </div>
                </div>

                <!-- License number -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="license">{{ __('License number') }}</label></div>
                    <div class="col-md-6"><input type="text" id="license"
                            class="form-control @error('license') is-invalid @enderror" name="license"
                            placeholder="{{$vehicle->license}}" maxlength="8" value="{{ old('license') }}" required
                            autocomplete="license" autofocus>@error('license')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>@enderror</div>
                </div>

                <!-- License image -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="licensepic">{{ __('License') }}</label>
                    </div>
                    <div class="col-md-6 col-form-label input-group">
                        <div class="custom-file">
                            <input type="file" class=" custom-file-input @error('licensepic') is-invalid
                                @enderror" name="licensepic" value="{{ old('licensepic') }}" required
                                autocomplete="licensepic" autofocus>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label class="custom-file-label" for="licensepic">Choose file</label>
                            @error('licensepic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>@enderror
                        </div>
                    </div>
                </div>
                <!-- License expiry date -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label
                            for="licenseexpiry">{{ __('License Expiry Date') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="date" id="licenseexpiry" name="licenseexpiry" class="form-control @error('licenseexpiry') is-invalid
                            @enderror" placeholder="{{$vehicle->licenseexpiry}}" value="{{ old('licenseexpiry') }}" required
                            autocomplete="licenseexpiry" autofocus>
                        @error('licenseexpiry')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>@enderror
                    </div>
                </div>
                <!-- Address -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="address">{{ __('Residential Address') }}</label></div>
                    <div class="col-md-6"><input type="text" id="address" class="form-control @error('address') is-invalid
                        @enderror" name="address"
                            placeholder="{{$vehicle->address}}" value="{{ old('address') }}" required autocomplete="address"
                            autofocus>
                    </div>
                </div>
                <!-- Plate number -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="platenumber">Plate number</label></div>
                    <div class="col-md-6"><input type="text" id="platenumber" class="form-control"
                            placeholder="{{$vehicle->platenumber}}" disabled></div>
                </div>
                <a class="btn white-text btn-rounded waves-effect rgba-purple-strong" href="{{route('Vehicle.index')}}"
                    style="float: right;">Cancel</a>
                <!-- Update button -->
                <button class="btn white-text btn-rounded waves-effect rgba-purple-strong" type="submit"
                    style="float: right;">Update Information</button>

            </form>
            <!-- Form -->
        </div>
    </div>
</div>
<!-- Material form subscription -->
@endsection
