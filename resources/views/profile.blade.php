@extends('layouts.form')

@section('content')
<div class="profilecard card-cascade narrower rgba-purple-strong">

    <!-- Card image -->
    <div class="profileview view-cascade overlay">
        <img class="img-fluid rounded-circle" src="/images/{{ Auth::user()->avatar }}">
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
                    <th scope="row"><strong>Staff ID No.</strong></th>
                    <td>{{ Auth::user()->username }} </td>
                </tr>
                <tr>
                    <th scope="row"><strong>Department Unit</strong></th>
                    <td>{{ Auth::user()->department->name }}</td>
                </tr>
                <tr>
                    <th scope="row"><strong>Change profile picture</strong></th>
                    <td>
                        <form class="md-form" enctype="multipart/form-data" action="/profile" method="POST">
                            <div class="file-field">
                                <a class="btn-floating purple-gradient mt-0 float-left">
                                    <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                                    <input type="file" name="avatar">
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
