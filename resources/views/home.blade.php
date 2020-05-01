@extends('layouts.main')

@section('contents')

<br>
<div class="container-fluid">
    <!-- Attendance Table -->
    <div class="row">
        <div class="col-6">
            <!-- Table with panel -->
            <div class="card card-cascade narrower">

                <!--Card image-->
                <div
                    class="view view-cascade gradient-card-header purple-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                    <a href="" class="white-text mx-3">Attendance</a>

                    <a href="{{ url('Attendance')}}"><button class="btn btn-rounded purple-gradient">All
                            attendance</button></a>

                </div>
                <!--/Card image-->

                <div class="px-4">

                    <div class="table-responsive text-nowrap">
                        <!--Table-->
                        <table class="table">

                            <!--Table head-->
                            <thead>
                                <tr>
                                    <th class="th-lg">
                                        <a>Staff ID No.
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
                                    <td>{{$attend->timein}}</td>
                                    <td>{{$attend->locationin}}</td>
                                    <td>{{$attend->timeout}}</td>
                                    <td>{{$attend->locationout}}</td>
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
            <!-- Table with panel -->
        </div>
        <div class="col-6">
            <!-- Table with panel -->
            <div class="card card-cascade narrower">
                <!-- Vehicles Table -->

                <!--Card image-->
                <div
                    class="view view-cascade gradient-card-header purple-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                    <a href="" class="white-text mx-3">Vehicle</a>

                    <a href="{{ url('Vehicle/create')}}"><button class="btn btn-rounded purple-gradient">Register
                            Vehicle</button></a>

                </div>
                <!--/Card image-->

                <div class="px-4">

                    <div class="table-responsive text-nowrap">
                        <!--Table-->
                        <table class="table">

                            <!--Table head-->
                            <thead>
                                <tr>
                                    <th class="th-lg">
                                        <a>Staff ID No.
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
        <!-- Table with panel -->
    </div>
</div>
</div>

@endsection
