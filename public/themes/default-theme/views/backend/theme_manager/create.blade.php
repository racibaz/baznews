@extends($activeTheme . '::backend.master')

{{--@section('title'){{trans('common.create')}}@stop--}}

@section('content')
    @include($activeTheme . '::backend.module_manager._form', ['record' => $record])
@stop
