@extends($themeAssetsPath . 'backend.master')

{{--@section('title'){{trans('common.create')}}@stop--}}

@section('content')
    @include($themeAssetsPath . 'backend.announcement._form', ['record' => $record])
@stop
