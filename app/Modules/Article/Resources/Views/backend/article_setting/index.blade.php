@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('article::article_setting.article_setting')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('article_setting.index') !!}">{{trans('article::article_setting.article_setting')}}</a></li>
        </ol>
    </section>
@endsection
@section('content')
    {!! Form::open(['route' => 'article_setting.store','method' => 'post']) !!}
    <div class="row">
        <div class="col-lg-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('article::article_setting.article_setting')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>

                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('article_count', trans('article::article_setting.article_count'),['class'=> ' control-label']) !!}
                        {!! Form::number('article_count', $records->where('attribute_key','article_count')->first()->attribute_value, ['placeholder' => trans('article::article_setting.article_count') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('article_author_count', trans('article::article_setting.article_author_count'),['class'=> ' control-label']) !!}
                        {!! Form::number('article_author_count', $records->where('attribute_key','article_author_count')->first()->attribute_value, ['placeholder' => trans('article::article_setting.article_author_count') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('recent_article_widget_list_count', trans('article::article_setting.recent_article_widget_list_count'),['class'=> ' control-label']) !!}
                        {!! Form::number('recent_article_widget_list_count', $records->where('attribute_key','recent_article_widget_list_count')->first()->attribute_value, ['placeholder' => trans('article::article_setting.recent_article_widget_list_count') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('article_authors_widget_list_count', trans('article::article_setting.article_authors_widget_list_count'),['class'=> ' control-label']) !!}
                        {!! Form::number('article_authors_widget_list_count', $records->where('attribute_key','article_authors_widget_list_count')->first()->attribute_value, ['placeholder' => trans('article::article_setting.article_authors_widget_list_count') ,'class' => 'form-control']) !!}
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
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('article_settings','article_management');
    </script>
@endsection