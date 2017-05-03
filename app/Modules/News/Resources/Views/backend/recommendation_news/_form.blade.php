@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::recommendation_news.management')}}
            <small>{{trans('news::recommendation_news.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('recommendation_news.index') !!}">{{trans('news::recommendation_news.management')}}</a></li>
            <li class="active">{{trans('news::recommendation_news.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['recommendation_news.update', $record], 'method' => 'PATCH']) !!}
    @else
        {!! Form::open(['route' => 'recommendation_news.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::recommendation_news.create_edit')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('news_id', trans('news::recommendation_news.news_id'),['class'=> 'control-label']) !!}
                        {!! Form::select('news_id', $newsList , $record->news_id , ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control select2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('user_id', trans('news::recommendation_news.user_id'),['class'=> 'control-label']) !!}
                        {!! Form::select('user_id', $userList , $record->user_id , ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control select2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('order', trans('news::recommendation_news.order'),['class'=> 'control-label']) !!}
                        {!! Form::number('order', $record->order, ['placeholder' => trans('news::recommendation_news.order') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_cuff', null , $record->is_active) !!}
                            {{trans('news::recommendation_news.is_cuff')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                            {{trans('news::recommendation_news.is_active')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ Theme::asset($activeTheme . '::js/select2/dist/css/select2.min.css') }}">
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });
        $(window).resize(function () {
            $('.select2').select2();
        });
        //active menu
        activeMenu('recommendation_news','news_management');
    </script>
@endsection