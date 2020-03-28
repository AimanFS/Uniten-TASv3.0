@extends('layouts.main')

@section('contents')
<br>
<div class="card card-cascade narrower">

    <!--Card image-->
    <div
        class="view view-cascade gradient-card-header purple-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

        <a href="" class="white-text mx-3">Attendance</a>

        <button class="btn btn-rounded purple-gradient">Filter</button>

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
                            <a href="">Date
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
                    <tr>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>

                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->
        </div>

    </div>

</div>
<!-- Table with panel -->
</div>
@endsection
