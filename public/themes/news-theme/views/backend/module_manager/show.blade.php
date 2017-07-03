@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('module_manager.management')}}
            <small>{{trans('module_manager.list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('module_manager.index') !!}"> {{trans('module_manager.management')}}</a></li>
            <li class="active">{{trans('module_manager.list')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    {{$record}}
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('module_manager', '');
    </script>
@endsection

