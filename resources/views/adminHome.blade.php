@extends('layouts.adminmain')

@section('contents')
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
                    @foreach($staffs as $stf)
                    <tr>
                        <td>{{$stf->name}}</td>
                        <td>{{$stf->username}}</td>
                        <td>{{$stf->email}}</td>
                        <td>{{$stf->phoneno}}</td>
                        <td>{{$stf->department->name}}</td>
                        <td>
                            <ul>
                            @foreach ($stf->vehicle as $plate)
                            <li> {{$plate->platenumber}}</li>
                               
                            @endforeach
                        </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->
        </div>

    </div>

</div>
@endsection
