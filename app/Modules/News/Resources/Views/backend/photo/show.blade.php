@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::photo.management')}}
            <small>{{trans('news::photo.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('news.index') !!}">{{trans('news::news.management')}}</a></li>
            <li class="active">{{trans('news::photo.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')

@endsection
@section('js')

    <script type="text/javascript">
        //active menu
        activeMenu('photo','news_management');
    </script>
@endsection
