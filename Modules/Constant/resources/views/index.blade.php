@extends('constant::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('constant.name') !!}</p>
@endsection
