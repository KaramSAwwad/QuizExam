@extends('panel::layouts.teacher.main')
@section('content')

    <div class="row mt-4">
        <div class="col-lg-9 col-12 mx-auto position-relative">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">add_task</i>
                    </div>
                    <h6 class="mb-0">Exam Questions</h6>
                </div>
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <h6>
                                    {{$exam->title}}
                                </h6>
                                <p class="form-text  ms-1">
                                    <span class="font-weight-bold">This Exam Start At:</span> {{$exam->start_at}}
                                    , {{\Carbon\Carbon::parse($exam->start_at)->diffForHumans(\Carbon\Carbon::now(),['parts'=>3,'short'=>true])}}
                                </p>
                                <p class="form-text ms-1">
                                    <span class="font-weight-bold">This Exam End At:</span> {{$exam->end_at}}
                                    , {{\Carbon\Carbon::parse($exam->end_at)->diffForHumans(\Carbon\Carbon::now(),['parts'=>3,'short'=>true])}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr style="background-image: linear-gradient(0deg,dimgray 2px,rgba(156,39,176,0) 0),linear-gradient(0deg,#d2d2d2 1px,hsla(0,0%,82%,0) 0);">
{{--                    @if($errors->has('email'))--}}

{{--                        <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
{{--                            <span class="alert-text"><strong>Error!</strong> {{ $errors->first('email') }}</span>--}}
{{--                            <button type="button" class="btn-close" data-bs-dismiss="alert"--}}
{{--                                    aria-label="Close">--}}
{{--                                <span aria-hidden="true"></span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    <form action="{{route('teacher.save.exam.questions',$exam->id)}}" method="post" role="form">
                        @csrf
                        @for($i=0;$i<$exam->num_of_questions;$i++)
                            <h6 class="mt-4">Questions Number {{$i+1}}</h6>
                            <div class="d-flex flex-wrap">
                                <div class="col-10 p-2">
                                    <div class="input-group input-group-dynamic">
                                        <label for="QuestionTitle" class="form-label">Question Title</label>
                                        <input type="text" class="form-control" name="questions[{{ $i }}][title]" id="QuestionTitle"
                                               onfocus="focused(this)"
                                               onfocusout="defocused(this)" required>
                                    </div>
                                </div>
                                <div class="col-2 p-2">
                                    <div class="input-group input-group-dynamic">
                                        <label for="QuestionMark" class="form-label">Questions Mark</label>
                                        <input type="number" class="form-control" name="questions[{{ $i }}][mark]" min="0.25" step="0.25"
                                               value="0.25"
                                               id="QuestionMark" onfocus="focused(this)" onfocusout="defocused(this)"
                                               required>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group input-group-dynamic mt-4">
                            <textarea class="form-control" rows="5" name="questions[{{ $i }}][text]"
                                      placeholder="Please Insert The Question Text For Question Number ({{$i+1}})"
                                      spellcheck="false" required></textarea>
                            </div>
                            {{--                        <div class="input-group input-group-dynamic mt-4">--}}
                            {{--                            <label class="form-label">Attachment Image</label>--}}
                            {{--                            <input type="file" accept="image/*">--}}
                            {{--                            <div class="avatar-wrapper">--}}
                            {{--                                <img class="profile-pic{{$i+1}}" src=""/>--}}
                            {{--                                <div class="upload-button">--}}
                            {{--                                    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>--}}
                            {{--                                </div>--}}
                            {{--                                <input class="file-upload" type="file" accept="image/*"/>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            <div class="row mt-4">
                                <label class="form-label">Question Choices</label>

                                <div class="col-12">
                                    <div class="input-group input-group-outline is-valid my-3">
                                        <label class="form-label">Correct Choice</label>
                                        <input type="text" name="questions[{{ $i }}][answer][{{ 0 }}]" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group input-group-outline is-invalid my-3">
                                        <label class="form-label">Wrong Choice</label>
                                        <input type="text" name="questions[{{ $i }}][answer][{{ 1 }}]" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group input-group-outline is-invalid my-3">
                                        <label class="form-label">Wrong Choice</label>
                                        <input type="text" name="questions[{{ $i }}][answer][{{ 2 }}]" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4"
                                style=" border-style: dotted; background-image: linear-gradient(0deg,dimgray 2px,rgba(156,39,176,0) 0),linear-gradient(0deg,#d2d2d2 1px,hsla(0,0%,82%,0) 0);">
                        @endfor

                        <div class="d-flex justify-content-end mt-4">
                            <a type="button" href="{{route('teacher.show.exams')}}" class="btn btn-light m-0">Cancel</a>
                            <button type="submit" name="button" class="btn bg-gradient-dark m-0 ms-2">Save Exam Question
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .avatar-wrapper {
            position: relative;
            height: 200px;
            width: 200px;
            margin: 50px auto;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 1px 1px 15px -5px black;
            transition: all .3s ease;

            &:hover {
                transform: scale(1.05);
                cursor: pointer;
            }

            &:hover .profile-pic {
                opacity: .5;
            }

            .profile-pic {
                height: 100%;
                width: 100%;
                transition: all .3s ease;

                &:after {
                    font-family: FontAwesome;
                    content: "\f007";
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    font-size: 190px;
                    background: #ecf0f1;
                    color: #34495e;
                    text-align: center;
                }
            }

            .upload-button {
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;

                .fa-arrow-circle-up {
                    position: absolute;
                    font-size: 234px;
                    top: -17px;
                    left: 0;
                    text-align: center;
                    opacity: 0;
                    transition: all .3s ease;
                    color: #34495e;
                }

                &:hover .fa-arrow-circle-up {
                    opacity: .9;
                }
            }
        }
    </style>


    {{--    <script src="--}}
    {{--    https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js--}}
    {{--    "></script>--}}
    <script>
        $(document).ready(function () {

            var readURL = function (input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.profile-pic[i]').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".file-upload").on('change', function () {
                readURL(this);
            });

            $(".upload-button").on('click', function () {
                $(".file-upload").click();
            });


        });
    </script>
@endsection
