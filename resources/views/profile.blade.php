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
                    <td>{{ Auth::user()->phoneno }} </td>
                </tr>
                <tr>
                    <th scope="row"><strong>Department Unit</strong></th>
                    <td>
                        <form enctype="multipart/form-data" action="/profile" method="POST">
                        <input type="hidden" value="{{ Auth::user()->department->name }}">Current department: {{ Auth::user()->department->name }}</input>
                        <select id="department_id" class="form-control" name="department_id"> 
                        @foreach($department as $dpt)
                        <option value="{{ $dpt->id }}">{{ $dpt->name }}</option>
                        @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><strong>Change profile picture</strong></th>
                    <td>
                            <div class="file-field">
                                <a class="btn-floating purple-gradient mt-0 float-left">
                                    <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                                    <input id="picupload" type="file" name="avatar">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </a>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload your file">
                                </div>
                            </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <button class="btn white-text btn-rounded z-depth-0 my-4 waves-effect purple-gradient" style="float: right;"
            type="submit">Update</button>
        </form>
    </div>

</div>


@endsection
