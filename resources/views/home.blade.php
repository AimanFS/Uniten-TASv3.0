@extends('layouts.main')

@section('contents')

<br>
<div class="container-fluid">
    <!-- Attendance Table -->

    <ul class="nav nav-tabs nav-justified md-tabs rgba-purple-strong" id="myTabJust" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab-just" data-toggle="tab" href="#home-just" role="tab"
                aria-controls="home-just" aria-selected="true">Attendances</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab-just" data-toggle="tab" href="#profile-just" role="tab"
                aria-controls="profile-just" aria-selected="false">Vehicles</a>
        </li>
    </ul>
    <div class="tab-content card pt-5" id="myTabContentJust">
        <div class="tab-pane fade show active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just">
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
        <div class="tab-pane fade" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-just">
            <div class="px-4">

                <div class="table-responsive text-nowrap table-wrapper-scroll-y my-custom-scrollbar">
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
</div>
    @endsection
