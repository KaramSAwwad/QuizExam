@extends('panel::layouts.student.main')
@section('content')
    <section class="py-3">
        <div class="row mb-4 mb-md-0">
            <div class="col-md-12 me-auto my-auto text-left">
                <h5>Your Available Exams</h5>
                <p>Here You Can See List Of All Available Exam And Apply For It</p>
            </div>
        </div>
        <div class="row mt-lg-4 mt-2">
            @if(isset($available_exams) and $available_exams != 0)
{{--            @if(isset($available_exams) and $available_exams[0]!=0)--}}
                @for($i=0;$i<count($available_exams);$i++)
                    @if($now->lt($available_exams[$i]->start_at))
                        <!-- in this case Schedule -->
                        <div class="col-lg-4 col-md-6 mb-4 mt-2 mt-md-0">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="d-flex mt-n2">
                                        <div class="avatar avatar-xl bg-gradient-info border-radius-xl p-2 mt-n4">
                                            <i class="material-icons opacity-10" style="font-size: 50px">article</i>
                                        </div>
                                        <div class="ms-3 my-auto">
                                            <h6 class="mb-0">{{$available_exams[$i]->title}}</h6>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="dropdown">
                                                <button class="btn btn-link text-secondary ps-0 pe-2"
                                                        id="navbarDropdownMenuLink1" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-lg" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end me-sm-n4 me-n3 text-center"
                                                     aria-labelledby="navbarDropdownMenuLink1">
                                                    <span class="text-info"> Scheduled ({{\Carbon\Carbon::parse($available_exams[$i]->start_at)->diffForHumans($now,['parts'=>5,'short'=>true])}})</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-sm mt-3">
                                    <h6>Exam Speciality: <span
                                            class="text-muted">{{$available_exams[$i]->speciality->name}}</span></h6>
                                    <h6>Teacher Name: <span
                                            class="text-muted">{{$available_exams[$i]->teacher->name}}</span></h6>
                                    <h6>Count Of Questions <span
                                            class="text-muted">{{$available_exams[$i]->questions_count}}</span></h6>

                                    </p>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="text-sm mb-0">{{array_sum($array_of_mark[$i])}}</h6>
                                            <p class="text-secondary text-sm font-weight-normal mb-0">Marks</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <h6 class="text-sm mb-0 text-info">{{\Carbon\Carbon::parse($available_exams[$i]->start_at)->format('y.m.d h:i A')}}</h6>
                                            <p class="text-secondary text-sm font-weight-normal mb-0">Due date</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($now->between($available_exams[$i]->start_at,\Carbon\Carbon::parse($available_exams[$i]->start_at)->addMinutes(15)))
                        <!-- in this case  exam active and you able to apply (exam start form only 15 minutes) -->
                        <div class="col-lg-4 col-md-6 mb-4 mt-2 mt-md-0">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="d-flex mt-n2">
                                        <div class="avatar avatar-xl bg-gradient-success border-radius-xl p-2 mt-n4">
                                            <i class="material-icons opacity-10" style="font-size: 50px">article</i>
                                        </div>
                                        <div class="ms-3 my-auto">
                                            <h6 class="mb-0">{{$available_exams[$i]->title}}</h6>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="dropdown">
                                                <button class="btn btn-link text-secondary ps-0 pe-2"
                                                        id="navbarDropdownMenuLink1" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-lg" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end me-sm-n4 me-n3 text-center"
                                                     aria-labelledby="navbarDropdownMenuLink1">
                                                    <a class="dropdown-item text-success" href="{{route('student.apply.to.active.exam',$available_exams[$i])}}">Apply
                                                        Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-sm mt-3">
                                    <h6>Exam Speciality: <span
                                            class="text-muted">{{$available_exams[$i]->teacher->name}}</span></h6>
                                    <h6>Teacher Name: <span
                                            class="text-muted">{{$available_exams[$i]->speciality->name}}</span></h6>
                                    <h6>Exam Speciality: <span
                                            class="text-muted">{{$available_exams[$i]->questions_count}}</span></h6>
                                    </p>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="text-sm mb-0">{{array_sum($array_of_mark[$i])}}</h6>
                                            <p class="text-secondary text-sm font-weight-normal mb-0">Marks</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <h6 class="text-sm mb-0 text-success">{{\Carbon\Carbon::parse($available_exams[$i]->start_at)->format('y.m.d h:i A')}}</h6>
                                            <p class="text-success text-sm font-weight-normal mb-0">Active Now</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($now->between(\Carbon\Carbon::parse($available_exams[$i]->start_at)->addMinutes(15)->addMicrosecond(), $available_exams[$i]->end_at))
                        <!-- in this case exam active and you unable to apply (exam start form over 15 minutes) -->
                        <div class="col-lg-4 col-md-6 mb-4 mt-2 mt-md-0">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="d-flex mt-n2">
                                        <div class="avatar avatar-xl bg-gradient-warning border-radius-xl p-2 mt-n4">
                                            <i class="material-icons opacity-10" style="font-size: 50px">article</i>
                                        </div>
                                        <div class="ms-3 my-auto">
                                            <h6 class="mb-0">{{$available_exams[$i]->title}}</h6>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="dropdown">
                                                <button class="btn btn-link text-secondary ps-0 pe-2"
                                                        id="navbarDropdownMenuLink1" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-lg" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end me-sm-n4 me-n3 text-center"
                                                     aria-labelledby="navbarDropdownMenuLink1">
                                                    <span class="text-danger text-center">Unable To Apply Since ({{\Carbon\Carbon::parse($available_exams[$i]->start_at)->addMinutes(15)->diffForHumans(\Carbon\Carbon::parse($now),['parts'=>5,'short'=>true])}})</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-sm mt-3">
                                    <h6>Exam Speciality: <span
                                            class="text-muted">{{$available_exams[$i]->teacher->name}}</span></h6>
                                    <h6>Teacher Name: <span
                                            class="text-muted">{{$available_exams[$i]->speciality->name}}</span></h6>
                                    <h6>Exam Speciality: <span
                                            class="text-muted">{{$available_exams[$i]->questions_count}}</span></h6>
                                    </p>
                                    <hr class="horizontal dark">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="text-sm mb-0">{{array_sum($array_of_mark[$i])}}</h6>
                                            <p class="text-secondary text-sm font-weight-normal mb-0">Marks</p>
                                        </div>
                                        <div class="col-6 text-end">
                                            <h6 class="text-sm mb-0 text-warning">{{\Carbon\Carbon::parse($available_exams[$i]->start_at)->format('y.m.d h:i A')}}</h6>
                                            <p class="text-secondary text-sm font-weight-normal mb-0">Due date</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            @else
                <div class="col-12 mb-4 mt-2 mt-md-0">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="d-flex mt-n2">
                                <div class="avatar avatar-xl bg-gradient-dark border-radius-xl p-2 mt-n4">
                                    <i class="material-icons opacity-10" style="font-size: 50px">bedtime</i>
                                </div>
                                <div class="ms-3 my-auto">
                                    <h6 class="mb-0">Not Available Exam</h6>
                                </div>
                            </div>
                            <p class="text-sm mt-3"> You don't have any active exam at the moment, keep sleeping </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
