@extends('layouts.main')

@section('contents')
<br>
<!-- Table with panel -->
<div class="card card-cascade narrower">

    <!--Card image-->
    <div
        class="view view-cascade gradient-card-header purple-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

        <a href="" class="white-text mx-3">Vehicle</a>


        <a href="{{route('Vehicle.create')}}"><button class="btn btn-rounded purple-gradient">Register Vehicle</button></a>


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
                        <th class="th-lg">
                            <a href="">Options
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
                    <td>    <form method="POST" action="/deletecar/{{$vehicles->id}}" >
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button>
                        </form>
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
<!-- Table with panel -->
@endsection
