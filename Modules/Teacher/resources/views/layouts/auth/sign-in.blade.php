<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <title>
        Material Dashboard 2 by Creative Tim
    </title>
    <link rel="icon" type="image/png" href="{{asset('favicon.ico')}}">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="{{asset('assets/css/material-dashboard.css')}}" rel="stylesheet" />

</head>

<body class="bg-gray-200">
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://img.freepik.com/free-vector/geometric-gradient-futuristic-background_23-2149116406.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-secondary shadow-secondary border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                                <h6 class="text-white font-weight-bolder text-center mt-2 mb-0">Welcome To Teacher Panel</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close">
                                        <span aria-hidden="true"></span>
                                    </button>
                                    <span class="alert-text"><strong>Error!</strong> {{Session::get('error')}}</span>
                                </div>
                            @endif
                            @if($errors->has('email'))

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-text"><strong>Error!</strong> {{ $errors->first('email') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close">
                                        <span aria-hidden="true"></span>
                                    </button>
                                </div>
                            @endif
                            @if($errors->has('password'))

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-text"><strong>Error!</strong> {{ $errors->first('password') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close">
                                        <span aria-hidden="true"></span>
                                    </button>
                                </div>
                            @endif
                            <form method="POST" action="{{route('teacher.signing-in')}}" role="form">
                                @csrf

                                <div class="form-group mb-2">
                                    <label class="form-label" for="username">Teacher Number </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="teacher_number" id=""
                                               placeholder="Please Enter Your Teacher Number" required>
                                    </div>
                                </div>
                                <!--end form-group-->

                                <div class="form-group mb-2">
                                    <label class="form-label"
                                           for="userpassword">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id=""
                                               placeholder="Please Enter Your Password" required>
                                    </div>
                                </div>
                                <div class="form-group mb-0 row">
                                    <div class="col-12">
                                        <button class="btn btn-secondary w-100 shadow-secondary waves-effect waves-light"
                                                type="submit">Login<i
                                                class="fas fa-sign-in-alt ms-1"></i></button>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end form-group-->
                            </form>

                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-2 text-sm mx-auto">
                                Dont have an account?
                                <a href="{{route('show.teacher.signup.form')}}" class="text-secondary  font-weight-bold">Sign Up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--   Core JS Files   -->
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/js/material-dashboard.min.js')}}"></script>
</body>

</html>
