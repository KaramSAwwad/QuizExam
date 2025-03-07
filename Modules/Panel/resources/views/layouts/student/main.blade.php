<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('favicon.ico')}}">
    <title>
       {{$page_name??"Page"}}
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/css/material-dashboard.css')}}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="{{asset('assets/js/nepcha-analytics.js')}}"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-info " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#" target="_blank">
            <img src="{{asset('assets/img/logo-ct.svg')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Student Panel</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link text-white--}}
{{--                 {{ Route::is('student.show.dashboard') ? 'active bg-gradient-light' : '' }} "--}}
{{--                   href="{{route('student.show.dashboard')}}">--}}
{{--                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">--}}
{{--                        <i class="material-icons opacity-10">dashboard</i>--}}
{{--                    </div>--}}
{{--                    <span class="nav-link-text ms-1 ">Dashboard</span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="nav-item">
                <a class="nav-link
                {{ Route::is('student.show.exams') ? 'active bg-gradient-light' : '' }}
                {{ Route::is('student.start.exam') ? 'active bg-gradient-light' : '' }}
                {{ Route::is('student.apply.to.active.exam') ? 'active bg-gradient-light' : '' }}

                " href="{{route('student.show.exams')}}">
                    <div class="text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">view_in_ar</i>
                    </div>
                    <span class="nav-link-text ms-1">Exams</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link
                 {{ Route::is('student.show.my.finished.exams') ? 'active bg-gradient-light' : '' }}
                 {{ Route::is('student.preview.finished.exam') ? 'active bg-gradient-light' : '' }}

                 "
                   href="{{route('student.show.my.finished.exams')}}">
                    <div class="text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">view_in_ar</i>
                    </div>
                    <span class="nav-link-text ms-1">My Finished Exams</span>
                </a>
            </li>

{{--            <li class="nav-item mt-3">--}}
{{--                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link  {{ Route::is('') ? 'active bg-gradient-light text-dark' : '' }} " href="{{route('student.show.dashboard')}}">--}}
{{--                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">--}}
{{--                        <i class="material-icons opacity-10 text-bg-dark">person</i>--}}
{{--                    </div>--}}
{{--                    <span class="nav-link-text ms-1 text-dark">Profile</span>--}}
{{--                </a>--}}
{{--            </li>--}}

        </ul>
    </div>
</aside>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
{{--            <nav aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">--}}
{{--                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>--}}
{{--                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>--}}
{{--                </ol>--}}
{{--                <h6 class="font-weight-bolder mb-0">Dashboard</h6>--}}
{{--            </nav>--}}
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
{{--                    <div class="input-group input-group-outline">--}}
{{--                        <label class="form-label">Type here...</label>--}}
{{--                        <input type="text" class="form-control">--}}
{{--                    </div>--}}
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>

{{--                    <li class="nav-item dropdown pe-2 d-flex align-items-center">--}}
{{--                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            <i class="fa fa-bell cursor-pointer"></i>--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">--}}
{{--                            <li class="mb-2">--}}
{{--                                <a class="dropdown-item border-radius-md" href="javascript:;">--}}
{{--                                    <div class="d-flex py-1">--}}
{{--                                        <div class="my-auto">--}}
{{--                                            <img src="{{asset('assets/img/team-2.jpg')}}" class="avatar avatar-sm  me-3 ">--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex flex-column justify-content-center">--}}
{{--                                            <h6 class="text-sm font-weight-normal mb-1">--}}
{{--                                                <span class="font-weight-bold">New message</span> from Laur--}}
{{--                                            </h6>--}}
{{--                                            <p class="text-xs text-secondary mb-0">--}}
{{--                                                <i class="fa fa-clock me-1"></i>--}}
{{--                                                13 minutes ago--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="mb-2">--}}
{{--                                <a class="dropdown-item border-radius-md" href="javascript:;">--}}
{{--                                    <div class="d-flex py-1">--}}
{{--                                        <div class="my-auto">--}}
{{--                                            <img src="{{asset('assets/img/small-logos/logo-spotify.svg')}}" class="avatar avatar-sm bg-gradient-dark  me-3 ">--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex flex-column justify-content-center">--}}
{{--                                            <h6 class="text-sm font-weight-normal mb-1">--}}
{{--                                                <span class="font-weight-bold">New album</span> by Travis Scott--}}
{{--                                            </h6>--}}
{{--                                            <p class="text-xs text-secondary mb-0">--}}
{{--                                                <i class="fa fa-clock me-1"></i>--}}
{{--                                                1 day--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="dropdown-item border-radius-md" href="javascript:;">--}}
{{--                                    <div class="d-flex py-1">--}}
{{--                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">--}}
{{--                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">--}}
{{--                                                <title>credit-card</title>--}}
{{--                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">--}}
{{--                                                        <g transform="translate(1716.000000, 291.000000)">--}}
{{--                                                            <g transform="translate(453.000000, 454.000000)">--}}
{{--                                                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>--}}
{{--                                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>--}}
{{--                                                            </g>--}}
{{--                                                        </g>--}}
{{--                                                    </g>--}}
{{--                                                </g>--}}
{{--                                            </svg>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex flex-column justify-content-center">--}}
{{--                                            <h6 class="text-sm font-weight-normal mb-1">--}}
{{--                                                Payment successfully completed--}}
{{--                                            </h6>--}}
{{--                                            <p class="text-xs text-secondary mb-0">--}}
{{--                                                <i class="fa fa-clock me-1"></i>--}}
{{--                                                2 days--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    <li class="nav-item d-flex align-items-center">

                        <form id="logout-form" action="{{ route('student.logout') }}" method="POST" class="d-none"> @csrf </form>
                        <a href="#" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
{{--                            <span class="d-sm-inline d-none">Logout</span>--}}
                        </a>
                        <a class="dropdown-item" href="" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i data-feather="power" class="align-self-center icon-xs icon-dual mr-1"></i> logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4 d-flex flex-column min-vh-95">
       @yield('content')
{{--        <footer class="footer py-4 mt-auto ">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row align-items-center justify-content-lg-between">--}}
{{--                    <div class="col-lg-6 mb-lg-0 mb-4">--}}
{{--                        <div class="copyright text-center text-sm text-muted text-lg-start">--}}
{{--                            © <script>--}}
{{--                                document.write(new Date().getFullYear())--}}
{{--                            </script>,--}}
{{--                            made with <i class="fa fa-heart"></i> by--}}
{{--                            <a href="#" class="font-weight-bold" target="_blank">Creative Tim</a>--}}
{{--                            for a better web.--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-6">--}}
{{--                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="#" class="nav-link text-muted" target="_blank">Creative Tim</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="#" class="nav-link text-muted" target="_blank">About Us</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="#" class="nav-link text-muted" target="_blank">Blog</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="#" class="nav-link pe-0 text-muted" target="_blank">License</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </footer>--}}
    </div>
</main>
<div class="fixed-plugin">
{{--    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">--}}
{{--        <i class="material-icons py-2">settings</i>--}}
{{--    </a>--}}
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3 d-flex">
                <h6 class="mb-0">Navbar Fixed</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="horizontal dark my-3">
            <div class="mt-2 d-flex">
                <h6 class="mb-0">Light / Dark</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <a class="btn bg-gradient-info w-100" href="#">Free Download</a>
            <a class="btn btn-outline-dark w-100" href="#">View documentation</a>
            <div class="w-100 text-center">
                <a class="github-button" href="#" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                <h6 class="mt-3">Thank you for sharing!</h6>
                <a href="#" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="#" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>

{{--<script src="--}}
{{--https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js--}}
{{--"></script>--}}
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datatables.js')}}"></script>

<script src="{{asset('assets/js/plugins/dragula/dragula.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jkanban/jkanban.js')}}"></script>

{{--<script async defer src="https://buttons.github.io/buttons.js"></script>--}}

<script src="{{asset('assets/js/material-dashboard.min.js')}}"></script>


<script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["M", "T", "W", "T", "F", "S", "S"],
            datasets: [{
                label: "Sales",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "rgba(255, 255, 255, .8)",
                data: [50, 20, 10, 22, 50, 10, 40],
                maxBarThickness: 6
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 500,
                        beginAtZero: true,
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#fff"
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0,
                borderWidth: 0,
                pointRadius: 5,
                pointBackgroundColor: "rgba(255, 255, 255, .8)",
                pointBorderColor: "transparent",
                borderColor: "rgba(255, 255, 255, .8)",
                borderColor: "rgba(255, 255, 255, .8)",
                borderWidth: 4,
                backgroundColor: "transparent",
                fill: true,
                data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0,
                borderWidth: 0,
                pointRadius: 5,
                pointBackgroundColor: "rgba(255, 255, 255, .8)",
                pointBorderColor: "transparent",
                borderColor: "rgba(255, 255, 255, .8)",
                borderWidth: 4,
                backgroundColor: "transparent",
                fill: true,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#f8f9fa',
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"89e09418ba499122","version":"2024.4.1","token":"1b7cbb72744b40c580f8633c6b62637e"}'
        crossorigin="anonymous"></script>

@include('sweetalert::alert')
</body>

</html>
