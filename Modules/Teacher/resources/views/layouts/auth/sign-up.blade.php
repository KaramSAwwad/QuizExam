<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{asset('favicon.ico')}}">
    <title>
        Material Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"/>
    <!-- Nucleo Icons -->
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/css/material-dashboard.css')}}" rel="stylesheet"/>
</head>

<body class="">
<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                        <div
                            class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                            style="background-image: url('../assets/img/illustrations/illustration-lock.jpg'); background-size: cover;">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                        <div class="card card-plain">
                            <div class="card-header">
                                <h4 class="font-weight-bolder">Sign Up As A Teacher</h4>
                                <p class="mb-0">Please Fill Your Information</p>
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
                                    @if($errors->has('mobile'))

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="alert-text"><strong>Error!</strong> {{ $errors->first('mobile') }}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close">
                                            <span aria-hidden="true"></span>
                                        </button>
                                    </div>
                                @endif
                                    @if($errors->has('speciality_id'))

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="alert-text"><strong>Error!</strong> {{ $errors->first('speciality_id') }}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close">
                                            <span aria-hidden="true"></span>
                                        </button>
                                    </div>
                                @endif

                                    <form method="POST" action="{{route('teacher.signing.up')}}" role="form">
                                        @csrf
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" name="mobile" class="form-control">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <select
                                            class="form-control mb-3 custom-select"
                                            name="speciality_id"
                                            aria-hidden="true" required>
                                            <option value="">Please Select Your Speciality</option>
                                            @foreach($specialities as $speciality)
                                                <option  value="{{$speciality->id}}">{{$speciality->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                                class="btn btn-lg bg-gradient-secondary shadow-secondary btn-lg w-100 mt-4 mb-0">Sign Up
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-2 text-sm mx-auto">
                                    Already have an account?
                                    <a href="{{route('show.teacher.login.form')}}" class="text-secondary font-weight-bold">Sign in</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/js/material-dashboard.min.js')}}"></script>
</body>
</html>
