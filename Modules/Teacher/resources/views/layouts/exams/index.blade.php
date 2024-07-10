@extends('panel::layouts.teacher.main')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Exams</h5>
                            <p class="text-sm mb-0">
                                In this list you can see all of your exams
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{route('teacher.show.create.new.exam.form')}}" class="btn bg-gradient-primary btn-sm mb-0"
                                >+&nbsp; New Exam</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                    Num Of Questions
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                    Total Mark
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                    Count Of Students
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Started At
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Ended At
                                </th>
                                <th class="text-secondary opacity-7">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(isset($data) and count($data)>0)

                                @for($i=0;$i<count($data);$i++)
                                    <tr>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$i+1}}</p>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$data[$i]->title}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            @if($data[$i]->questions()->count() > 0)
                                                <p class="text-xs font-weight-bold mb-0">{{$data[$i]->questions()->count()}}</p>
                                            @else
                                                <p class="text-xxs text-danger font-weight-bold mb-0"> This Exam Dose Not Have Any Questions</p>
                                            @endif

                                        </td>
                                        <td class="text-center">
                                            @if($data[$i]->questions()->count() > 0)
                                                <h6 class="text-xs font-weight-bold mb-0">{{array_sum($array_of_mark[$i])}}</h6>
                                            @else
                                                <p class="text-xxs text-danger font-weight-bold mb-0"> 0 </p>
                                            @endif

                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$data[$i]->students()->count()}}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @php
                                                $currentDateTime = \Carbon\Carbon::now()
                                            @endphp
                                            @if($currentDateTime->lt($data[$i]->start_at))
                                                <span class="badge badge-sm badge-warning">
                                                     Scheduled ({{\Carbon\Carbon::parse($data[$i]->start_at)->diffForHumans($currentDateTime,['parts'=>3,'short'=>true])}})
                                                 </span>

                                            @elseif($currentDateTime->between($data[$i]->start_at,$data[$i]->end_at))
                                                <span class="badge badge-sm badge-success">
                                                    Currently Active ({{\Carbon\Carbon::parse($data[$i]->start_at)->diffForHumans($currentDateTime,['parts'=>3,'short'=>true])}})
                                                </span>
                                            @else
                                                <span class="badge badge-sm badge-danger">
                                                   Closed ({{\Carbon\Carbon::parse($data[$i]->start_at)->diffForHumans($currentDateTime,['parts'=>3,'short'=>true])}})
                                             </span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-info text-xs font-weight-bold">{{$data[$i]->start_at}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-danger text-xs font-weight-bold">{{$data[$i]->end_at}}</span>
                                        </td>
                                        <td class="text-sm">
                                            <a href="{{route('teacher.previewExam.exam',$data[$i]->id)}}" data-bs-toggle="tooltip"
                                               data-bs-original-title="Preview Exam">
                                                <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                                            </a>
                                            @if($currentDateTime->gt($data[$i]->start_at) and $currentDateTime->gt($data[$i]->end_at))
                                                <a href="" class="mx-3" data-bs-toggle="tooltip"
                                                   data-bs-original-title="You Dont Have Access To Update Closed Exam">
                                                    <i class="material-icons text-danger position-relative text-lg">drive_file_rename_outline</i>
                                                </a>
                                            @else
                                                <a href="{{route('teacher.show.edit.exam.form',$data[$i]->id)}}" class="mx-3" data-bs-toggle="tooltip"
                                                   data-bs-original-title="Edit Exam">
                                                    <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                                                </a>
                                            @endif
                                            <a href="{{route('teacher.delete.exam',$data[$i]->id)}}" data-bs-toggle="tooltip"
                                               data-bs-original-title="Delete Exam">
                                                <i class="material-icons text-secondary position-relative text-lg">delete</i>
                                            </a>
                                            @if($data[$i]->is_draft == "true")
                                            <a href="{{route('teacher.fill.exam.questions',$data[$i]->id)}}" data-bs-toggle="tooltip"
                                               data-bs-original-title="Add Questions">
                                                <i class="material-icons text-secondary font-weight-bolder position-relative text-lg mx-1">add_task</i>
                                            </a>
                                            @endif
                                        </td>

                                    </tr>
                                @endfor
                            @else
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <span class="text-danger text-lg">No Exam Found</span>
                                    </td>
                                </tr>
                            @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
