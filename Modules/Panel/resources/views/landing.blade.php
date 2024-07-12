@extends('panel::layouts.master')

@section('content')
    <div class="row mt-6 d-flex justify-content-center">
        <div class="card col-lg-3 col-md-6 col-12 my-3 mx-3" data-animation="true" style="background-color: lightsteelblue;">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <a class="d-block blur-shadow-image">
                    <img
{{--                        src="https://facts.net/wp-content/uploads/2023/09/18-fascinating-facts-about-teacher-1695689724.jpg"--}}
                        src="{{asset('assets/img/teacher.jpg')}}"
                        alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                </a>
                <div class="colored-shadow"
{{--                     style="background-image: url(&quot;https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg&quot;);"></div>--}}
                     style="background-image: url(&quot;https://facts.net/wp-content/uploads/2023/09/18-fascinating-facts-about-teacher-1695689724.jpg&quot;);"></div>
            </div>
            <div class="card-body text-center">
                <div class="d-flex mt-n6 mx-auto">
                    <a class="btn btn-link text-primary ms-auto border-0" href="{{route('show.teacher.signup.form')}}"
                       data-bs-toggle="tooltip"
                       data-bs-placement="bottom" title="Refresh">
                        <span class="badge badge-lg badge-warning">SIGN UP</span>
                    </a>
                    <a class="btn btn-link text-info me-auto border-0" href="{{route('show.teacher.login.form')}}"
                       data-bs-toggle="tooltip"
                       data-bs-placement="bottom" title="Edit">
                        <span class="badge badge-lg badge-info">SIGN IN</span>
                    </a>
                </div>

                <h5 class="font-weight-normal mt-3">
                    <a href="javascript:;">Are you A Teacher ?</a>
                </h5>
                <p class="mb-0">
                    You can use our website to create exams and let your students apply for them..
                </p>
            </div>
            <hr class="dark horizontal my-0">
            {{--            <div class="card-footer d-flex">--}}
            {{--                <p class="font-weight-normal my-auto">$899/night</p>--}}
            {{--                <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">place</i>--}}
            {{--                <p class="text-sm my-auto"> Barcelona, Spain</p>--}}
            {{--            </div>--}}
        </div>

        <div class="card col-lg-3 col-md-6 col-12 my-3 mx-3" data-animation="true" style="background-color: lightskyblue;">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2" >
                <a class="d-block blur-shadow-image">
                    <img
{{--                        src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg"--}}
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkyTfVBpEoEkHVnDg9sN43g8KZgtCEiJ6h5w&s"
                        alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                </a>
                <div class="colored-shadow"
                     style="background-image: url(&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkyTfVBpEoEkHVnDg9sN43g8KZgtCEiJ6h5w&s&quot;);"></div>
            </div>
            <div class="card-body text-center">
                <div class="d-flex mt-n6 mx-auto">
                    <a class="btn btn-link text-primary ms-auto border-0" href="{{route('show.student.signup.form')}}""
                       data-bs-placement="bottom" title="Refresh">
                        <span class="badge badge-lg badge-warning">SIGN UP</span>
                    </a>
                    <a class="btn btn-link text-info me-auto border-0" href="{{route('show.student.login.form')}}"
                       data-bs-toggle="tooltip"
                       data-bs-placement="bottom" title="Edit">
                        <span class="badge badge-lg badge-info">SIGN IN</span>
                    </a>
                </div>
                <h5 class="font-weight-normal mt-3">
                    <a href="javascript:;">Are you a student??</a>
                </h5>
                <p class="mb-0">
                    Here you can solve Exams and practice your skills and knowledge..
                </p>
            </div>
            <hr class="dark horizontal my-0">
            {{--            <div class="card-footer d-flex">--}}
            {{--                <p class="font-weight-normal my-auto">$899/night</p>--}}
            {{--                <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">place</i>--}}
            {{--                <p class="text-sm my-auto"> Barcelona, Spain</p>--}}
            {{--            </div>--}}
        </div>
    </div>
@endsection
