@extends('panel::layouts.student.main')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">My Finished Exams</h5>
                            <p class="text-sm mb-0">
                                In this list you can see all of your finished exams
                            </p>
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
                                    My Mark
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
                                <th class="text-secondary opacity-7 text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $currentDateTime = \Carbon\Carbon::now()
                            @endphp
                            @if(isset($data->exams) and count($data->exams)>0)
                                @for($i=0;$i<count($data->exams);$i++)
                                    <tr>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$i+1}}</p>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$data->exams[$i]->exam->title}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{$data->exams[$i]->exam->questions()->count()}}</p>
                                        </td>
                                        <td class="text-center">
                                            @if($currentDateTime->gt($data->exams[$i]->exam->end_at))
                                                <span class="badge badge-sm badge-info">{{$data->exams[$i]->mark}}</span>  <span class="text-xxs">/{{array_sum($array_of_questions_mark[$i])}}</span>
                                            @else
                                                <p class="text-xxs text-warning font-weight-bold mb-0 ">Calculating
                                                    ..</p>
                                            @endif
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            @if( $currentDateTime->between($data->exams[$i]->exam->start_at, $data->exams[$i]->exam->end_at))
                                                <span class="badge badge-sm badge-warning">
                                                      Currently Active, Finishing In  ({{$currentDateTime->diffForHumans(\Carbon\Carbon::parse($data->exams[$i]->exam->end_at),['parts'=>3,'short'=>true])}})
                                                 </span>

                                            @elseif($currentDateTime->gt($data->exams[$i]->exam->end_at))
                                                <span class="badge badge-sm badge-info">
                                                    Closed ({{\Carbon\Carbon::parse($data->exams[$i]->exam->end_at)->diffForHumans($currentDateTime,['parts'=>3,'short'=>true])}})
                                                </span>
                                            @else
                                                <span class="badge badge-sm badge-danger">
                                                  Not Don This Exam
                                             </span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-info text-xs font-weight-bold">{{$data->exams[$i]->exam->start_at}}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-danger text-xs font-weight-bold">{{$data->exams[$i]->exam->end_at}}</span>
                                        </td>
                                        <td class="text-sm text-center">
                                            @if($currentDateTime->gt($data->exams[$i]->exam->end_at))
                                                <a href="{{route('student.preview.finished.exam',$data->exams[$i]->exam->id)}}"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-original-title="Preview Exam">
                                                    <i class="material-icons text-success position-relative text-lg">visibility</i>
                                                </a>
                                            @else
                                                <a href="#"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-original-title="Preview Exam Not Available">
                                                    <i class="material-icons text-warning position-relative text-lg">visibility</i>
                                                </a>
                                            @endif


                                        </td>

                                    </tr>
                                @endfor
                            @else
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <span class="text-danger text-lg">You Still Have Not Completed Any Exam</span>
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
