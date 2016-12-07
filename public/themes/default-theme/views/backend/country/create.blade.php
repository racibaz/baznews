@extends($activeTheme . '::backend.master')

{{--@section('title'){{trans('common.create')}}@stop--}}

@section('content')
    @include($activeTheme . '::backend.country._form', ['record' => $record])
@stop
