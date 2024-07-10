@extends('panel::layouts.teacher.main')
@section('content')
    <div class="row mt-4">
        @if($errors->has('end_at'))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-text"><strong>Error!</strong> {{ $errors->first('end_at') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
        @endif
        <form action="{{ route('teacher.create.draft.exam') }}" method="post" role="form">
            @csrf
            <div class="col-lg-9 col-12 mx-auto position-relative">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                            <i class="material-icons opacity-10">event</i>
                        </div>
                        <h6 class="mb-0">New Exam</h6>
                    </div>
                    <div class="card-body pt-2">
                        <div class="d-flex flex-wrap">
                            <div class="col-6 p-2">
                                <div class="input-group input-group-dynamic">
                                    <label for="title" class="form-label">Exam Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                           onfocus="focused(this)"
                                           onfocusout="defocused(this)" required>
                                </div>
                            </div>
                            <div class="col-6 p-2">
                                <div class="input-group input-group-dynamic">
                                <label for="num_of_questions" class="form-label">Number Of Questions</label>
                                    <input type="text" class="form-control" name="num_of_questions" min="1"
                                           id="num_of_questions" onfocus="focused(this)" onfocusout="defocused(this)" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="input-group input-group-static">
                                    <label>Start Date</label>
                                    <input class="form-control datetimepicker flatpickr-input" name="start_at"
                                           type="datetime-local" data-input="" onfocus="focused(this)"
                                           onfocusout="defocused(this)" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-static">
                                    <label>End Date</label>
                                    <input class="form-control datetimepicker flatpickr-input" name="end_at"
                                           type="datetime-local" data-input="" onfocus="focused(this)"
                                           onfocusout="defocused(this)" required>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <a type="button" href="{{route('teacher.show.exams')}}" class="btn btn-light m-0">Cancel</a>
                            <button type="submit" name="button" class="btn bg-gradient-dark m-0 ms-2">Create Exam
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
