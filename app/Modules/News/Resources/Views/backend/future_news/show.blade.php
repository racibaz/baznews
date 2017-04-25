@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('city.management')}}
            <small>{{trans('city.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('city.index') !!}">{{trans('city.management')}}</a></li>
            <li class="active">{{trans('city.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')

@endsection

