@extends('default-theme::backend.master')

{{--@section('title'){{ $record->title }}@stop--}}
{{--@section('title-description'){{trans('common.edit')}}@stop--}}

@section('content')
    @include('default-theme::backend.announcement._form', ['record' => $record])
@stop


