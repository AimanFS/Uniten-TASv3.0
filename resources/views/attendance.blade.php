@extends('layouts.main')

@section('contents')
<br>
<div class="card card-cascade narrower">

    <!--Card image-->
    <div
        class="view view-cascade gradient-card-header rgba-purple-strong narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
        <a href="" class="white-text mx-3">Attendance</a>
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
                        <th class="th-lg">
                            <a href="">Duration
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
                        <td>
                            <?php $startTime = \Carbon\Carbon::parse($attend->timein);
                            $endTime = \Carbon\Carbon::parse($attend->timeout); $totalDuration = $endTime->diff($startTime)->format('%H hours %I')." Minutes";?>
                            {{$totalDuration}}
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
<!-- Table with panel -->
</div>
@endsection
