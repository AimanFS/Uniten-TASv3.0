<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UNITEN TAS v3.0</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/css/mdb.css" rel="stylesheet">

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/js/mdb.js"></script>


    <style>
        .content {
            min-height: 100vh;
            height: auto;
            transition: all 0.2s ease-in-out;
        }

        .button-collapse {
            position: fixed;
            left: 10px;
            top: 10px;
            z-index: 10;
        }

        @media(min-width: 1440px) {
            .content {
                padding-left: 250px;
            }
        }

        .sidebarlogo {
            height: auto;
            width: auto;
        }

        .iconcustom {
            font-size: 1.5em !important;
        }

        .sidenavbg {
            background-color: #43425D;
        }

        .profilecard {
            margin: 0 auto;
            /* Added */
            float: none;
            /* Added */
            margin-bottom: 10px;
            /* Added */
            font-weight: 400;
            border: 0;
            -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12)
        }

        .profileview {
            height: 250px;
            width: 250px;
            margin-top: 1%;
            margin-left: 1%;
            margin-bottom: 1%;
            position: relative;
            overflow: hidden;
            cursor: default
        }

        .profilecard {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
        }

    </style>
</head>

<body class="fixed-sn deep-purple-skin">

    <!--Double navigation-->
    <header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav fixed">
            <ul class="custom-scrollbar">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper waves-light" style="height: 175px;">
                        <a href="#"><img src="/images/taslogo.png" class="img-fluid flex-center"></a>
                    </div>
                </li>
                <!--/. Logo -->
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li><a href="{{ route('home') }}"><i class="fas fa-home iconcustom"></i>Home</a>
                        </li>
                        <li><a href="{{ url('Attendance')}}"><i class="fas fa-user-check iconcustom"></i>Attendance</a>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i
                                    class="fas fa-car iconcustom"></i>Vehicles<i
                                    class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ url('Vehicle')}}" class="waves-effect">View Registered Vehicle</a>
                                    </li>
                                    <li><a href="{{route('Vehicle.create')}}" class="waves-effect">Register Vehicle</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a><i class="far fa-file-alt iconcustom"></i> Out of Office Form</a>
                        </li>
                        <li><a><i class="fas fa-exclamation iconcustom"></i>Violations</a>
                        </li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg rgba-purple-strong"></div>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p>UNITEN TAS v3.0</p>
            </div>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->

    <!--Main Layout-->
    <main>
        <!-- Card Narrower -->
        <div class="profilecard card-cascade narrower rgba-purple-strong">

            <!-- Card image -->
            <div class="profileview view-cascade overlay">
                <img class="img-fluid rounded-circle" src="/images/profilepic.jpg" alt="Card image cap">
            </div>
            <!-- Card content -->
            <div class="card-body card-body-cascade">
                <table class="table text-nowrap table-borderless text-light border border-white" style="background-color: #3C3B54">
                    <tbody>
                        <tr>
                            <th scope="col"><strong>Name</strong></th>
                            <td scope="col">{{ Auth::user()->name }} </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <th scope="row"><strong>Staff ID No.</strong></th>
                            <td>{{ Auth::user()->username }} </td>
                        </tr>
                        <tr>
                            <th scope="row"><strong>Department</strong></th>
                            <td scope="row">{{ Auth::user()->department->name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- Card Narrower -->
        @yield('contents')
    </main>
    <!--Main Layout-->
    <script>
        $(document).ready(function () {

            // SideNav Button Initialization
            $(".button-collapse").sideNav();
            // SideNav Scrollbar Initialization
            var sideNavScrollbar = document.querySelector('.custom-scrollbar');
            var ps = new PerfectScrollbar(sideNavScrollbar);
        })

    </script>
</body>

</html>
