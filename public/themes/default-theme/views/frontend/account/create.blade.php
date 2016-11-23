@extends($activeTheme . '::frontend.master')

{{--@section('title'){{trans('common.create')}}@stop--}}

@section('content')
    @include($activeTheme . '::frontend.account._form', ['record' => $record])
@stop
