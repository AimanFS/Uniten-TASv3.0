@extends('layouts.form')

@section('content')
<div class="profilecard card-cascade narrower rgba-purple-strong">

    <!-- Card image -->
    <div class="profileview view-cascade overlay">
        <img class="img-fluid rounded-circle" src="/images/{{ Auth::user()->avatar }}" id="blah">
    </div>
    <!-- Card content -->
    <div class="card-body card-body-cascade">
        <table class="table text-nowrap table-borderless text-light border border-white"
            style="background-color: #3C3B54">
            <tbody>
                <tr>
                    <th scope="col"><strong>Name</strong></th>
                    <td scope="col">{{ Auth::user()->name }} </td>
                </tr>
                <tr>
                    <th scope="row"><strong>Staff No.</strong></th>
                    <td>{{ Auth::user()->username }} </td>
                </tr>
                <tr>
                    <th scope="row"><strong>Email</strong></th>
                    <td>{{ Auth::user()->email }} </td>
                </tr>
                <tr>
                    <th scope="row"><strong>Phone number</strong></th>
                    <form action="/profilephone" method="POST">
                        @csrf
                        <td><input type="text" class="form-control @error('phoneno') is-invalid @enderror"
                                value="{{ Auth::user()->phoneno }}" name="phoneno" maxlength="11" autocomplete="phoneno">
                            @error('phoneno')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button class="btn white-text btn-rounded waves-effect purple-gradient"
                                style="float: right;" type="submit">Update phone number</button>
                    </form>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><strong>Department Unit</strong></th>
                    <td>
                        <form action="/profiledpt" method="POST">
                            @csrf
                        <input type="hidden">Current department:
                        {{ Auth::user()->department->name }}</input>
                        <select id="department_id" class="form-control @error('department_id') is-invalid @enderror"
                            name="department_id" value="{{old('department_id')}}" autocomplete="department_id">
                            <option value="" default>Select department</option>
                            @foreach($department as $dpt)
                            <option value="{{ $dpt->id }}">{{ $dpt->name }}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button class="btn white-text btn-rounded waves-effect purple-gradient"
                                style="float: right;" type="submit">Change department</button>
                    </td>
                </form>
                </tr>
                <tr>
                    <th scope="row"><strong>Profile Picture</strong></th>
                    <td>
                        <form enctype="multipart/form-data" action="/profile" method="POST">
                            <div class="file-field">
                                <a class="btn purple-gradient mt-0 float-left">
                                    <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                                    <input id="picupload" type="file" class="@error('avatar') is-invalid @enderror"
                                        name="avatar" required autocomplete="avatar" autofocus>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </a>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload your file" disabled>
                                </div>
                                @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <button class="btn white-text btn-rounded waves-effect purple-gradient"
                                style="float: right;" type="submit">Update profile picture</button>
                        </form>
                            </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <a class="btn white-text btn-rounded z-depth-0 my-4 waves-effect purple-gradient" style="float: right;"
            href="{{route('home')}}">Cancel</a>
    </div>

</div>


@endsection
