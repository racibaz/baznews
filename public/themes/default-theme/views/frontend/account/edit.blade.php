@extends($activeTheme . '::frontend.master')

{{--@section('title'){{ $record->title }}@stop--}}
{{--@section('title-description'){{trans('common.edit')}}@stop--}}

@section('content')
    @include($activeTheme . '::frontend.account._form', ['record' => $record])
@stop


