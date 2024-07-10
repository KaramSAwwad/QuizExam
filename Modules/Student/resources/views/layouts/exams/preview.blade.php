@extends('panel::layouts.student.main')
@section('content')

    <div class="row mt-4">
        <div class="col-lg-9 col-12 mx-auto position-relative">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">add_task</i>
                    </div>
                    <h6 class="mb-0">Exam Details</h6>
                </div>
                <div class="card-body pt-2">
                        <div class="d-flex flex-wrap">
                            <div class="col-10 p-2">
                                <div class="input-group input-group-dynamic">
                                    <label for="title" class="form-label">Exam Title</label>
                                    <input type="text" value="{{$exam->title}}" class="form-control" name="title" id="title"
                                           onfocus="focused(this)"
                                           onfocusout="defocused(this)" disabled>
                                </div>
                            </div>
                            <div class="col-2 p-2">
                                <div class="input-group input-group-dynamic">
                                    <label for="num_of_questions" class="form-label">Number Of Questions</label>
                                    <input type="text" class="form-control" value="{{$exam->num_of_questions}}" name="num_of_questions" min="1"
                                           id="num_of_questions" onfocus="focused(this)" onfocusout="defocused(this)" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                                <div class="col-6">
                                    <div class="input-group input-group-static">
                                        <label>Start Date</label>
                                        <input class="form-control datetimepicker flatpickr-input" name="start_at"
                                               type="datetime-local" value="{{$exam->start_at}}" data-input="" onfocus="focused(this)"
                                               onfocusout="defocused(this)" disabled>
                                    </div>
                                </div>
                            <div class="col-6">
                                <div class="input-group input-group-static">
                                    <label>End Date</label>
                                    <input class="form-control datetimepicker flatpickr-input" name="end_at"
                                           type="datetime-local" data-input="" value="{{$exam->end_at}}" onfocus="focused(this)"
                                           onfocusout="defocused(this)" disabled>
                                </div>
                            </div>
                        </div>
                        @for($i=0;$i<$exam->questions()->count();$i++)
                            <h6 class="mt-4">Questions Number {{$i+1}}</h6>
                            <div class="d-flex flex-wrap">
                                <div class="col-10 p-2">
                                    <div class="input-group input-group-dynamic">
                                        <label for="QuestionTitle" class="form-label">Question Title</label>
                                        <input type="text" class="form-control" id="QuestionTitle"
                                               value="{{$exam->questions[$i]->question_title}}"
                                               onfocus="focused(this)"
                                               onfocusout="defocused(this)" disabled>
                                    </div>
                                </div>
                                <div class="col-2 p-2">
                                    <div class="input-group input-group-dynamic">
                                        <label for="QuestionMark" class="form-label">Questions Mark</label>
                                        <input type="number" class="form-control" min="0.25" step="0.25"
                                               value="{{$exam->questions[$i]->mark}}"
                                               id="QuestionMark" onfocus="focused(this)" onfocusout="defocused(this)"
                                               disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group input-group-dynamic mt-4">
                            <textarea class="form-control" rows="5"
                                      placeholder="Please Insert The Question Text For Question Number ({{$i+1}})"
                                      spellcheck="false" disabled>{{$exam->questions[$i]->question_text}}</textarea>
                            </div>
                            <div class="row mt-4">
                                <label class="form-label">Question Choices</label>

                                <div class="col-12">
                                    <div class="input-group  my-3" style="border: 2px dotted #1a73e8; border-radius: 6px;">
                                        <label class="form-label">Your Choice</label>
                                        <input type="text"  class="form-control" value="Your Choice: {{$exam->questions[$i]->answers[0]->answer_text}}" disabled>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group input-group-outline is-valid my-3">
                                        <label class="form-label">Correct Choice</label>
                                        <input type="text"  class="form-control" value="{{$exam->questions[$i]->answers[0]->answer_text}}"  disabled>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group input-group-outline is-invalid my-3">
                                        <label class="form-label">Wrong Choice</label>
                                        <input type="text"  class="form-control" value="{{$exam->questions[$i]->answers[1]->answer_text}}" disabled>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group input-group-outline is-invalid my-3">
                                        <label class="form-label">Wrong Choice</label>
                                        <input type="text"  class="form-control" value="{{$exam->questions[$i]->answers[2]->answer_text}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4"
                                style=" border-style: dotted; background-image: linear-gradient(0deg,dimgray 2px,rgba(156,39,176,0) 0),linear-gradient(0deg,#d2d2d2 1px,hsla(0,0%,82%,0) 0);">
                        @endfor

                        <div class="d-flex justify-content-end mt-4">
                            <a type="button" href="{{route('student.show.my.finished.exams')}}" class="btn btn-light m-0">Cancel</a>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
