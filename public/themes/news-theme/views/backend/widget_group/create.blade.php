@extends($activeTheme . '::backend.master')

{{--@section('title'){{trans('common.create')}}@stop--}}

@section('content')
    @include($activeTheme . '::backend.widget_group._form', ['record' => $record])
@stop
