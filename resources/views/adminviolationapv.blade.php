@extends('layouts.adminmain')

@section('contents')
<!-- Table with panel -->
    <div class="card card-cascade narrower">

        <!--Card image-->
        <div
            class="view view-cascade gradient-card-header purple-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

            <a href="" class="white-text mx-3">Approved Violation(s)</a>

        </div>
        <!--/Card image-->

        <div class="px-4">

            <div class="table-responsive">
                <!--Table-->
                <table class="table" style="table-layout: fixed;">

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
                                <a href="">Vehicle Used
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Violation(s)
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Remark
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Approval
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                    <tbody>
                        @foreach($attendance as $attend)
                        <tr>
                            <td>{{$attend->staff->username}}</td>
                            <td>{{$attend->timein}}</td>
                            <td>{{$attend->locationin}}</td>
                            <td>{{$attend->timeout}}</td>
                            <td>{{$attend->locationout}}</td>
                            <td>{{$attend->vehicle->platenumber}}</td>
                            <td>
                                <ul>
                                    @if ($attend->timein == NULL)
                                    <li>No clock in!</li>
                                    @else
                                    <?php $time = date("H:i:s",strtotime($attend->timein))?>
                                    @if($time > '08:01:00')
                                    <li>Late check in!</li>
                                    @endif
                                    @endif
                                    @if ($attend->timeout == NULL)
                                    <li>No clock out!</li>
                                    @else
                                    <?php $time = date("H:i:s",strtotime($attend->timeout))?>
                                    @if($time < '17:15:00' ) <li>Early Leave</li>
                                        @endif

                                    @endif
                                </ul>
                            </td>
                            <td style="width:300px; word-wrap:break-word;">@if($attend->remark == NULL)
                                {{'No remark available!'}}
                                @else
                                {{$attend->remark}}
                                @endif
                            </td>
                            <td>{{$attend->approve}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <!--Table body-->
                </table>
                {{$attendance->links()}}
                <!--Table-->
            </div>

        </div>

    </div>
@endsection
