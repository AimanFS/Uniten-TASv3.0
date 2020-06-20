@extends('layouts.adminmain')

@section('contents')
<!-- Table with panel -->
<div class="card card-cascade narrower">

    <!--Card image-->
    <div
        class="view view-cascade gradient-card-header purple-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

        <a href="" class="white-text mx-3">Staff List</a>

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
                            <a>Name
                            </a>
                        </th>
                        <th class="th-lg">
                            <a href="">Staff No.
                            </a>
                        </th>
                        <th class="th-lg">
                            <a href="">Email
                            </a>
                        </th>
                        <th class="th-lg">
                            <a href="">Phone Number
                            </a>
                        </th>
                        <th class="th-lg">
                            <a href="">Department
                            </a>
                        </th>
                        <th class="th-lg">
                            <a href="">Vehicle(s)
                            </a>
                        </th>
                        <th class="th-lg">
                            <a href="">Attendance(s)
                            </a>
                        </th>
                    </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                    @foreach($staffs as $stf)
                    <tr>
                        <td>{{$stf->name}}</td>
                        <td>{{$stf->username}}</td>
                        <td>{{$stf->email}}</td>
                        <td>{{$stf->phoneno}}</td>
                        <td>{{$stf->department->name}}</td>
                        <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#centralModalSm{{$stf->username}}">
                                    List
                                </button>

                                <!-- Central Modal Small -->
                                <div class="modal fade" id="centralModalSm{{$stf->username}}" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">

                                    <!-- Change class .modal-sm to change the size of the modal -->
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title w-100" id="myModalLabel">Vehicle List</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <table class="table">
                                                        <!--Table head-->
                                                        <thead>
                                                            <tr>
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
                                                        <!--Table body-->
                                                        <tbody>
                                                            @foreach($stf->vehicle->sortByDesc('created_at')->where("state", 0) as $vehicles)
                                                            <tr>
                                                                <td>{{$vehicles->brand}}</td>
                                                                <td>{{$vehicles->model}}</td>
                                                                <td>{{$vehicles->color}}</td>
                                                                <td>{{$vehicles->platenumber}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Central Modal Small -->
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#centralModal{{$stf->username}}">
                                List
                            </button>

                            <!-- Central Modal Small -->
                            <div class="modal fade" id="centralModal{{$stf->username}}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">

                                <!-- Change class .modal-sm to change the size of the modal -->
                                <div class="modal-dialog modal-dialog-centered modal-fluid" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title w-100" id="myModalLabel">Attendance Logs</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <table class="table">
                                                    <!--Table head-->
                                                    <thead>
                                                        <tr>
                                                            <th class="th-lg">
                                                                <a href="">Staff No.
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
                                                                <a href="">Vehicle Used
                                                                </a>
                                                            </th>
                                                            <th class="th-lg">
                                                                <a href="">Duration
                                                                </a>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <!--Table body-->
                                                    <tbody>
                                                        @foreach($stf->attendance->sortByDesc('created_at') as $attend)
                                                        <tr>
                                                            <td>{{$stf->username}}</td>
                                                            <td>{{$attend->timein}}</td>
                                                            <td>{{$attend->locationin}}</td>
                                                            <td>{{$attend->timeout}}</td>
                                                            <td>{{$attend->locationout}}</td>
                                                            <td>{{$attend->vehicle->platenumber}}</td>
                                                            <td>
                                                                <?php $startTime = \Carbon\Carbon::parse($attend->timein);
                                                                $endTime = \Carbon\Carbon::parse($attend->timeout); $totalDuration = $endTime->diff($startTime)->format('%H hours %I')." Minutes";?>
                                                                {{$totalDuration}}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Central Modal Small -->
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                <!--Table body-->
            </table>
            {{$staffs->links()}}
            <!--Table-->
        </div>

    </div>

</div>
@endsection
