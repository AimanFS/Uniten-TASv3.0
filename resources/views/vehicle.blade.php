@extends('layouts.main')

@section('contents')
<br>
<!-- Table with panel -->
<div class="card card-cascade narrower">

    <!--Card image-->
    <div
        class="view view-cascade rgba-purple-strong narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

        <a href="" class="white-text mx-3">Vehicle</a>


        <a href="{{route('Vehicle.create')}}"><button class="btn btn-secondary btn-rounded">Register
                Vehicle</button></a>


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
                            <a href="">
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
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#centralModalSm{{$vehicles->id}}">
                                options
                            </button>

                            <!-- Central Modal Small -->
                            <div class="modal fade" id="centralModalSm{{$vehicles->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">

                                <!-- Change class .modal-sm to change the size of the modal -->
                                <div class="modal-dialog modal-sm" role="document">


                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title w-100" id="myModalLabel">Option</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <a href="/editvehicle/{{$vehicles->id}}">
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="fas fa-edit"></i></button></a>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <form method="POST" action="/deletecar/{{$vehicles->id}}">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
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
            {{$vehicle->links()}}
            <!--Table-->
        </div>

    </div>

</div>
<!-- Table with panel -->
@endsection
