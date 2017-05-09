@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('article::article_setting.management')}}
            <small>{{trans('article::article_setting.list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('article_setting.index') !!}">{{trans('article::article_setting.management')}}</a></li>
            <li class="active">{{trans('article::article_setting.list')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    {!! Form::open(['route' => 'article_setting.store','method' => 'post']) !!}
    <div class="row">
        <div class="col-lg-6">
            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        {!! Form::label('article_count', trans('article::article_setting.article_count'),['class'=> 'col-lg-2 control-label']) !!}

                        <div class="col-lg-10">
                            {!! Form::number('article_count', $records->where('attribute_key','article_count')->first()->attribute_value, ['placeholder' => trans('article::article_setting.article_count') ,'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        {!! Form::label('article_author_count', trans('article::article_setting.article_author_count'),['class'=> 'col-lg-2 control-label']) !!}

                        <div class="col-lg-10">
                            {!! Form::number('article_author_count', $records->where('attribute_key','article_author_count')->first()->attribute_value, ['placeholder' => trans('article::article_setting.article_author_count') ,'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        {!! Form::label('recent_article_widget_list_count', trans('article::article_setting.recent_article_widget_list_count'),['class'=> 'col-lg-2 control-label']) !!}

                        <div class="col-lg-10">
                            {!! Form::number('recent_article_widget_list_count', $records->where('attribute_key','recent_article_widget_list_count')->first()->attribute_value, ['placeholder' => trans('article::article_setting.recent_article_widget_list_count') ,'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        {!! Form::label('article_authors_widget_list_count', trans('article::article_setting.article_authors_widget_list_count'),['class'=> 'col-lg-2 control-label']) !!}

                        <div class="col-lg-10">
                            {!! Form::number('article_authors_widget_list_count', $records->where('attribute_key','article_authors_widget_list_count')->first()->attribute_value, ['placeholder' => trans('article::article_setting.article_authors_widget_list_count') ,'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('css')
@endsection

@section('js')
@endsection