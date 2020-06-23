@extends('layouts.main')

@section('contents')
<br>
<div class="card card-cascade narrower">

    <!--Card image-->
    <div
        class="view view-cascade gradient-card-header rgba-purple-strong narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

        <a href="" class="white-text mx-3">Violation Logs</a>

    </div>
    <!--/Card image-->

    <div class="px-4">

        <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
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
                        <th class="th-lg">
                            <a href="">Violation
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
                        <td>{{$attend->staff->username }}</td>
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
                                @if($time < '17:15:00') <li>Early Leave</li>
                                    @endif

                                    @endif

                            </ul>
                        </td>
                        <td style="width:300px; word-wrap:break-word;">@if($attend->remark == NULL)
                            {{'No remark available!'}}
                            @else
                            {{$attend->remark}}</td>
                        @endif
                        @if($attend->remark != NULL)
                        <td style="width:300px; word-wrap:break-word;"><button type="button" class="btn btn-primary"
                                data-toggle="modal" data-target="#centralModalSm" disabled>
                                Add remark
                            </button></td>
                        @else
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#centralModalSm">
                                Add remark
                            </button>

                            <!-- Central Modal Small -->
                            <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">

                                <!-- Change class .modal-sm to change the size of the modal -->
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title w-100" id="myModalLabel">Staff remark</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="/staffremark/{{$attend->id}}">
                                                @csrf
                                                <div class="md-form">
                                                    <textarea id="remark" class="form-control md-textarea" length="120"
                                                        rows="3" name="remark"></textarea>
                                                    <label for="remark">Type your text</label>
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
                        @endif
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
<!-- Table with panel -->
</div>
@endsection
