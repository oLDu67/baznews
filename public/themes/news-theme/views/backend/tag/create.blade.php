@extends($activeTheme . '::backend.master')

{{--@section('title'){{trans('common.create')}}@stop--}}

@section('content')
    @include($activeTheme . '::backend.tag._form', ['record' => $record])
@stop
