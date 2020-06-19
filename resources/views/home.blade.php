@extends('layouts.main')

@section('contents')

<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="card card-cascade narrower">
                <!-- Attendance Table -->
                <div
                    class="view view-cascade gradient-card-header rgba-purple-strong narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                    <a class="white-text mx-3">Attendance</a>

                    <a href="{{route('Attendance.index')}}"><button class="btn btn-secondary btn-rounded">All Attendances</button></a>

                </div>
                <!--/Card image-->

                <div class="px-4">

                    <div class="table-responsive text-nowrap table-wrapper-scroll-y my-custom-scrollbar">
                        <!--Table-->
                        <table class="table">

                            <!--Table head-->
                            <thead>
                                <tr>
                                    <th class="th-lg">
                                        <a>Staff No.
                                        </a>
                                    </th>
                                    <th class="th-lg">
                                        <a href="">Time In
                                        </a>
                                    </th>
                                    <th class="th-lg">
                                        <a href="">Location In
                                        </a>
                                    </th>
                                    <th class="th-lg">
                                        <a href="">Time Out
                                        </a>
                                    </th>
                                    <th class="th-lg">
                                        <a href="">Location Out
                                        </a>
                                    </th>
                                    <th class="th-lg">
                                        <a href="">Plate Number
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <!--Table head-->

                            <!--Table body-->
                            <tbody>
                                @foreach($attendance as $attend)
                                <tr>
                                    <td>{{ Auth::user()->username}}</td>
                                    @if($attend->timein == NULL)
                                    <td>N/A</td>
                                    @else
                                    <td>{{$attend->timein}}</td>
                                    @endif
                                    @if($attend->locationin == NULL)
                                    <td>N/A</td>
                                    @else
                                    <td>{{$attend->locationin}}</td>
                                    @endif
                                    @if($attend->timeout == NULL)
                                    <td>N/A</td>
                                    @else
                                    <td>{{$attend->timeout}}</td>
                                    @endif
                                    @if($attend->locationout == NULL)
                                    <td>N/A</td>
                                    @else
                                    <td>{{$attend->locationout}}</td>
                                    @endif
                                    <td>{{$attend->vehicle->platenumber}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                            <!--Table body-->
                        </table>
                        <!--Table-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-cascade narrower">
                <div
                    class="view view-cascade rgba-purple-strong narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                    <a href="" class="white-text mx-3">Vehicle</a>
                    <a href="{{route('Vehicle.create')}}"><button class="btn btn-secondary btn-rounded">Register
                            Vehicle</button></a>
                </div>
                <!--/Card image-->
                <div class="px-4">
                    <div class="table-responsive text-nowrap table-wrapper-scroll-y my-custom-scrollbar">
                        <!--Table-->
                        <table class="table">
                            <!--Table head-->
                            <thead>
                                <tr>
                                    <th class="th-lg">
                                        <a>Staff No.
                                        </a>
                                    </th>
                                    <th class="th-lg">
                                        <a href="">Brand
                                        </a>
                                    </th>
                                    <th class="th-lg">
                                        <a href="">Model
                                        </a>
                                    </th>
                                    <th class="th-lg">
                                        <a href="">Colour

                                        </a>
                                    </th>
                                    <th class="th-lg">
                                        <a href="">Plate Number
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <!--Table head-->

                            <!--Table body-->
                            <tbody>
                                @foreach($vehicle as $vehicles)
                                <tr>
                                    <td>{{ Auth::user()->username}}</td>
                                    <td>{{$vehicles->brand}}</td>
                                    <td>{{$vehicles->model}}</td>
                                    <td>{{$vehicles->color}}</td>
                                    <td>{{$vehicles->platenumber}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!--Table body-->
                        </table>
                        <!--Table-->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
