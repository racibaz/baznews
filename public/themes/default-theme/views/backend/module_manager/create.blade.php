@extends('default-theme::backend.master')

{{--@section('title'){{trans('common.create')}}@stop--}}

@section('content')
    @include('default-theme::backend.module_manager._form', ['record' => $record])
@stop
