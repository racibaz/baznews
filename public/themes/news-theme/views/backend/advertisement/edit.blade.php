@extends($activeTheme . '::backend.master')

{{--@section('title'){{ $record->title }}@stop--}}
{{--@section('title-description'){{trans('common.edit')}}@stop--}}

@section('content')
    @include($activeTheme . '::backend.advertisement._form', ['record' => $record])
@stop


