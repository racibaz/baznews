@extends($activeTheme .'::backend.master')

{{--@section('title'){{trans('common.create')}}@stop--}}

@section('content')
    @include($activeTheme .'::backend.announcement._form', ['record' => $record])
@stop
