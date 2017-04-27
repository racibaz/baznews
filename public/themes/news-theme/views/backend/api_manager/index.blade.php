@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('api_manager.management')}}
            <small>{{trans('api_manager.list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('api_manager') !!}">{{trans('api_manager.management')}}</a></li>
            <li class="active">{{trans('api_manager.list')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <passport-clients></passport-clients>
    <passport-authorized-clients></passport-authorized-clients>
    <passport-personal-access-tokens></passport-personal-access-tokens>
@endsection