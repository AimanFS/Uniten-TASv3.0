@extends('layouts.adminmain')

@section('contents')
<!-- Table with panel -->
<div class="card card-cascade narrower">

    <!--Card image-->
    <div
        class="view view-cascade gradient-card-header purple-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

        <a href="" class="white-text mx-3">Staff Log w/Violations</a>

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
