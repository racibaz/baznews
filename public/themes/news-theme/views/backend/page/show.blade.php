@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('page.management')}}
            <small>{{trans('page.edit_create')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('page.index') !!}"> {{trans('page.management')}}</a></li>
            <li class="active">{{trans('page.edit_create')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    {{var_dump($record)}}

@endsection

