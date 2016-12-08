@extends($activeTheme . '::backend.master')

{{--@section('title'){{trans('common.create')}}@stop--}}

@section('content')
    @include($activeTheme . '::backend.widget_manager._form', ['record' => $record])
@stop
