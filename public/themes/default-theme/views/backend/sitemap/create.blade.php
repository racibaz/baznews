@extends($activeTheme . '::backend.master')

{{--@section('title'){{trans('common.create')}}@stop--}}

@section('content')
    @include('default-theme::backend.sitemap._form', ['record' => $record])
@stop
