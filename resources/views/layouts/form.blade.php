<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UNITEN TAS v3.0</title>
    <!-- Font Awesome -->

    <!-- Stylesheet -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->



    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/css/mdb.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/colorPick.css">

    <script src="https://kit.fontawesome.com/a0abfe3bf3.js" crossorigin="anonymous"></script>
    <!-- Car Brand and Model dropdown js -->
    <script type="text/javascript">
        function populate(brd, mdl) {
            var brd = document.getElementById(brd);
            var mdl = document.getElementById(mdl);
            mdl.innerHTML = "";
            if (brd.value == "Honda") {
                var optionArray = ["Select Model|Select Model", "Jazz|Jazz", "City|City", "Civic|Civic",
                    "Civic Type R|Civic Type R", "Accord|Accord", "BR-V|BR-V", "HR-V|HR-V", "CR-V|CR-V",
                    "Odyssey|Odyssey"
                ];
            } else if (brd.value == "Toyota") {
                var optionArray = ["Select Model|Select Model", "Vios|Vios", "Corolla Altis|Corolla Altis",
                    "Camry|Camry", "Avanza|Avanza", "Innova|Innova", "Alphard|Alphard", "Vellfire|Vellfire",
                    "Rush|Rush", "CH-R|CH-R", "Harrier|Harrier", "Fortuner|Fortuner", "Hilux|Hilux", "Hiace|Hiace",
                    "Yaris|Yaris", "GR Supra|GR Supra"
                ];
            } else if (brd.value == "Perodua") {
                var optionArray = ["Select Model|Select Model", "Axia|Axia", "Aruz|Aruz", "Myvi|Myvi", "Bezza|Bezza",
                    "Alza|Alza"
                ];
            } else if (brd.value == "Proton") {
                var optionArray = ["Select Model|Select Model", "X70|X70", "Saga|Saga", "Persona|Persona", "Iriz|Iriz",
                    "Exora|Exora", "Perdana|Perdana"
                ];
            } else if (brd.value == "BMW") {
                var optionArray = ["Select Model|Select Model", "1 Series|1 Series", "M2 Coupe|M2 Coupe",
                    "3 Series|3 Series", "4 Series Coupe|4 Series Coupe", "M4 Coupe|M4 Coupe", "5 Series|5 Series",
                    "M5|M5", "6 Series GT|6 Series GT", "7 Series|7 Series", "8 Series|8 Series", "X1|X1", "X2|X2",
                    "X3|X3", "X4|X4", "X5|X5", , "X6 M|X6 M", "X7|X7", "Z4|Z4", "i3s|i3s", "i8 Coupe|i8 Coupe"
                ];
            }
            for (var option in optionArray) {
                var pair = optionArray[option].split("|");
                var newOption = document.createElement("option");
                newOption.value = pair[0];
                newOption.innerHTML = pair[1];
                mdl.options.add(newOption);
            }
        }

    </script>

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

        .carWhite {
            color: #ffffff;
        }

        .carYellow {
            color: yellow;
        }

        .carBlue {
            color: blue;
        }

        .carRed {
            color: red;
        }

        .carGreen {
            color: green;
        }

        .carBlack {
            color: black;
        }

        .carBrown {
            color: brown;
        }

        .carTeal {
            color: teal;
        }

        .carPurple {
            color: purple;
        }

        .carOrange {
            color: orange;
        }

        .carCyan {
            color: cyan;
        }

        .outline {
            -webkit-text-stroke: 1px black;
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
                                    <li><a href="{{ route('Vehicle.create')}}" class="waves-effect">Register Vehicle</a>
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

                    <!-- Profile pic in navbar -->
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        style="position: relative; padding-left:50px">
                        <img src="/images/{{ Auth::user()->avatar }}"
                            style="width:32px; height:32px; position:absolute;bottom:1px; left:10px; border-radius:50%">{{ Auth::user()->name }}
                        <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/profile">
                            Profile
                        </a>
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
    <main>
        @yield('content')
    </main>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

    <!-- JQuery -->

    <!-- Bootstrap tooltips -->

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/js/mdb.js"></script>
    <script>
        $(document).ready(function () {

            // SideNav Button Initialization
            $(".button-collapse").sideNav();
            // SideNav Scrollbar Initialization
            var sideNavScrollbar = document.querySelector('.custom-scrollbar');
            var ps = new PerfectScrollbar(sideNavScrollbar);
        })

    </script>
    <script src="/js/ntc.js"></script>
    <script src="/js/colorPick.js"></script>
    <script>
        $(".colorPickSelector").colorPick({
            'initialColor': '#3498db',
            'allowRecent': true,
            'recentMax': 5,
            'allowCustomColor': false,
            'palette': ["#1abc9c", "#16a085", "#2ecc71", "#27ae60", "#3498db", "#2980b9", "#9b59b6", "#8e44ad",
                "#34495e", "#2c3e50", "#f1c40f", "#f39c12", "#e67e22", "#d35400", "#e74c3c", "#c0392b",
                "#ecf0f1", "#bdc3c7", "#95a5a6", "#7f8c8d"
            ],
            'onColorSelected': function () {
                this.element.css({
                    'backgroundColor': this.color,
                    'color': this.color
                });
                result = ntc.name(this.color);
                console.log(this.color);
                console.log(result[1]);
                $("#carcolour").val(result[1]);
            }
        });

    </script>


</body>
