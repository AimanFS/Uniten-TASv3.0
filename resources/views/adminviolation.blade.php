@extends('layouts.adminmain')

@section('contents')
<!-- Table with panel -->
<div class="card card-cascade narrower">

    <!--Card image-->
    <div
        class="view view-cascade gradient-card-header purple-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

        <a href="" class="white-text mx-3">Unapproved violation(s)</a>

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
                                <li>Late</li>
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
                            {{$attend->remark}}</td>
                            @endif
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#centralModalSm">
                                Approval
                            </button>

                            <!-- Central Modal Small -->
                            <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">

                                <!-- Change class .modal-sm to change the size of the modal -->
                                <div class="modal-dialog modal-sm" role="document">


                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title w-100" id="myModalLabel">Remark approval</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="/adminapprove/{{$attend->id}}">
                                                @csrf
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" id="approved"
                                                        name="approve" value="Approved">
                                                    <label class="form-check-label" for="approved">Approve</label>
                                                </div>

                                                <!-- Material inline 2 -->
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" id="rejected"
                                                        name="approve" value="Rejected">
                                                    <label class="form-check-label" for="rejected">Reject</label>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                        </div>
                                        </form>
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
            {{$attendance->links()}}
            <!--Table-->
        </div>

    </div>

</div>
@endsection
