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
                    <div class="col-md-6 col-form-label"><label for="brand">{{ __('Brand') }}</label></div>
                    <div class="col-md-6"><select id="brand" class="form-control @error('brand') is-invalid @enderror"
                            name="brand" onchange="populate(this.id,'model')" value="{{ old('brand') }}" required
                            autocomplete="brand" autofocus>
                            <option value="">Select Brand</option>
                            <option value="Alfa Romeo">Alfa Romeo</option>
                            <option value="Audi">Audi</option>
                            <option value="Austin">Austin</option>
                            <option value="BMW">BMW</option>
                            <option value="BMW Alpina">BMW Alpina</option>
                            <option value="Bentley">Bentley</option>
                            <option value="Cadillac">Cadillac</option>
                            <option value="Chery">Chery</option>
                            <option value="Chevrolet">Chevrolet</option>
                            <option value="Chrysler">Chrysler</option>
                            <option value="Citroen">Citroen</option>
                            <option value="Daihatsu">Daihatsu</option>
                            <option value="Dodge">Dodge</option>
                            <option value="Ferrari">Ferrari</option>
                            <option value="Fiat">Fiat</option>
                            <option value="Ford">Ford</option>
                            <option value="Haval">Haval</option>
                            <option value="Honda">Honda</option>
                            <option value="Hummer">Hummer</option>
                            <option value="Infiniti">Infiniti</option>
                            <option value="Isuzu">Isuzu</option>
                            <option value="Jaguar">Jaguar</option>
                            <option value="Jeep">Jeep</option>
                            <option value="Kia">Kia</option>
                            <option value="Lamborghini">Lamborghini</option>
                            <option value="Land Rover">Land Rover</option>
                            <option value="Lexus">Lexus</option>
                            <option value="Lotus">Lotus</option>
                            <option value="Maserati">Maserati</option>
                            <option value="McLaren">McLaren</option>
                            <option value="Mercedes Benz">Mercedes Benz</option>
                            <option value="Mercedes-Maybach">Mercedes-Maybach</option>
                            <option value="Mitsubishi">Mitsubishi</option>
                            <option value="Mitsuoka">Mitsuoka</option>
                            <option value="Naza">Naza</option>
                            <option value="Nissan">Nissan</option>
                            <option value="Perodua">Perodua</option>
                            <option value="Peugeot">Peugeot</option>
                            <option value="Porsche">Porsche</option>
                            <option value="Proton">Proton</option>
                            <option value="Renault">Renault</option>
                            <option value="Rolls-Royce">Rolls-Royce</option>
                            <option value="Rover">Rover</option>
                            <option value="Smart">Smart</option>
                            <option value="Ssangyong">Ssangyong</option>
                            <option value="Subaru">Subaru</option>
                            <option value="Suzuki">Suzuki</option>
                            <option value="Tesla">Tesla</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Volkswagen">Volkswagen</option>
                            <option value="Volvo">Volvo</option>
                            <option value="Wald">Wald</option>
                        </select>
                        @error('brand')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror</div>
                </div>

                <!-- Vehicle model -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="model">{{ __('Model') }}</label></div>
                    <div class="col-md-6"><select id="model" class="form-control @error('model')
                        is-invalid @enderror" name="model" value="{{ old('model') }}" required autocomplete="model"
                            autofocus></select>@error('model')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror</div>
                </div>

                <!-- Vehicle color -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="color">{{ __('Color') }}</label></div>
                    <div class="col-md-6">
                        <div class="colorPickSelector border rounded mb-0">{{ __('Color') }}</div>
                        <input type="hidden" id="carcolour" value="" name="color" class="@error('color')
                        is-invalid @enderror" value="{{ old('color') }}" required autocomplete="color"
                            autofocus>@error('color')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>@enderror
                    </div>
                </div>

                <!-- IC number -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="ic">{{ __('IC number') }}</label></div>
                    <div class="col-md-6"><input type="text" id="ic" class="form-control  @error('ic')
                        is-invalid @enderror" name="ic" value="{{ old('ic') }}" required autocomplete="ic"
                            autofocus>@error('ic')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>@enderror</div>
                </div>

                <!-- IC image-->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="icpic">{{ __('Identity Card') }}</label></div>
                    <div class="col-md-6 col-form-label input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('icpic') is-invalid
                            @enderror" name="icpic" value="{{ old('icpic') }}" required autocomplete="icpic" autofocus>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label class="custom-file-label" for="icpic">Choose file</label>
                            @error('icpic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>@enderror
                        </div>
                    </div>
                </div>

                <!-- License number -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="license">{{ __('License number') }}</label></div>
                    <div class="col-md-6"><input type="text" id="license"
                            class="form-control @error('license') is-invalid @enderror" name="license"
                            value="{{ old('license') }}" maxlength="8" required autocomplete="license" autofocus>@error('license')
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
                            <input type="file" class="custom-file-input @error('licensepic') is-invalid
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
                        @enderror" placeholder="yyyy-dd-mm" value="{{ old('licenseexpiry') }}" required
                            autocomplete="licenseexpiry" autofocus>
                        @error('licenseexpiry')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>@enderror
                    </div>
                </div>

                <!-- Address -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="address">{{ __('Residential Address') }}</label>
                    </div>
                    <div class="col-md-6"><input type="text" id="address" class="form-control @error('address') is-invalid
                        @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"
                            autofocus>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>@enderror</div>
                </div>
                <!-- Plate number -->
                <div class="row">
                    <div class="col-md-6 col-form-label"><label for="platenumber">{{ __('Plate number') }}</label></div>
                    <div class="col-md-6"><input type="text" id="platenumber" name="platenumber" class="form-control @error('platenumber') is-invalid
                        @enderror" value="{{ old('platenumber') }}" required autocomplete="address" autofocus>
                        @error('platenumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>@enderror</div>
                </div>
                <!-- Sign in button -->
                <button class="btn white-text btn-rounded waves-effect rgba-purple-strong" type="submit"
                    style="float: right;">Register</button>
            </form>

            <h3>
                Disclaimer
            </h3>
            <h5>For every registration, a fee of RM3 will be deducted from your salary.</h5>
            <!-- Form -->
        </div>



    </div>
</div>
</div>
@endsection
