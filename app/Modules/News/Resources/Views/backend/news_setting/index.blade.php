@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::news.management')}}
            <small>{{trans('news::news_setting.news_create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('news.index') !!}">{{trans('news::news.management')}}</a></li>
            <li class="active">{{trans('news::news_setting.news_create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    {!! Form::open(['route' => 'news_setting.store','method' => 'post', 'files' => 'true']) !!}
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::news_setting.news_setting')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('break_news', trans('news::news_setting.break_news'),['class'=> 'control-label']) !!}
                                {!! Form::number('break_news', $records->where('attribute_key','break_news')->first()->attribute_value, ['placeholder' => trans('news::news_setting.break_news') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('band_news', trans('news::news_setting.band_news'),['class'=> 'control-label']) !!}
                                {!! Form::number('band_news', $records->where('attribute_key','band_news')->first()->attribute_value, ['placeholder' => trans('news::news_setting.band_news') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('box_cuff', trans('news::news_setting.box_cuff'),['class'=> 'control-label']) !!}
                                {!! Form::number('box_cuff', $records->where('attribute_key','box_cuff')->first()->attribute_value, ['placeholder' => trans('news::news_setting.box_cuff') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('main_cuff', trans('news::news_setting.main_cuff'),['class'=> 'control-label']) !!}
                                {!! Form::number('main_cuff', $records->where('attribute_key','main_cuff')->first()->attribute_value, ['placeholder' => trans('news::news_setting.main_cuff') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('mini_cuff', trans('news::news_setting.mini_cuff'),['class'=> 'control-label']) !!}
                                {!! Form::number('mini_cuff', $records->where('attribute_key','mini_cuff')->first()->attribute_value, ['placeholder' => trans('news::news_setting.mini_cuff') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('find_tags_in_content', trans('news::news_setting.find_tags_in_content'),['class'=> 'control-label']) !!}
                                {!! Form::number('find_tags_in_content', $records->where('attribute_key','find_tags_in_content')->first()->attribute_value, ['placeholder' => trans('news::news_setting.find_tags_in_content') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('automatic_add_tags', trans('news::news_setting.automatic_add_tags'),['class'=> 'control-label']) !!}
                                {!! Form::number('automatic_add_tags', $records->where('attribute_key','automatic_add_tags')->first()->attribute_value, ['placeholder' => trans('news::news_setting.automatic_add_tags') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <div class="form-group">
                                {!! Form::label('is_show_previous_and_next_news', trans('news::news_setting.is_show_previous_and_next_news'),['class'=> ' control-label']) !!}
                                {!! Form::number('is_show_previous_and_next_news', $records->where('attribute_key','is_show_previous_and_next_news')->first()->attribute_value, ['placeholder' => trans('news::news_setting.is_show_previous_and_next_news') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div><!-- end row -->
    <!-- Main Content Element  End-->

    {!! Form::close() !!}
@endsection

@section('css')
    <style>
        #preview {display: none;}
        .display {display: block !important;}
    </style>
@endsection

@section('js')

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                $( "#preview" ).addClass( "display" );
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#icon").change(function(){
            readURL(this);
        });
    </script>
@endsection