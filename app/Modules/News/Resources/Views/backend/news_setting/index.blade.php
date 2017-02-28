@extends($activeTheme .'::backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--Top header start-->
                <h3 class="ls-top-header">{{trans('news::news_setting.management')}}</h3>
                <!--Top header end -->

                <!--Top breadcrumb start -->
                <ol class="breadcrumb">
                    <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                    <li><a href="{!! URL::route('news_setting.index') !!}"> {{ trans('news::news_setting.news_categories') }} </a></li>
                    <li class="active"> {{ trans('news::common.add_update') }}</li>
                </ol>
                <!--Top breadcrumb start -->
            </div>
        </div>
        <!-- Main Content Element  Start-->
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-light-blue">
                    <div class="panel-heading">
                        {{--/<h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>--}}
                    </div>
                    {!! Form::open(['route' => 'news_setting.store','method' => 'post', 'files' => 'true']) !!}

                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('break_news', trans('news::news_setting.break_news'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('break_news', $records->where('attribute_key','break_news')->first()->attribute_value, ['placeholder' => trans('news::news_setting.break_news') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('band_news', trans('news::news_setting.band_news'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('band_news', $records->where('attribute_key','band_news')->first()->attribute_value, ['placeholder' => trans('news::news_setting.band_news') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('box_cuff', trans('news::news_setting.box_cuff'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('box_cuff', $records->where('attribute_key','box_cuff')->first()->attribute_value, ['placeholder' => trans('news::news_setting.box_cuff') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('main_cuff', trans('news::news_setting.main_cuff'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('main_cuff', $records->where('attribute_key','main_cuff')->first()->attribute_value, ['placeholder' => trans('news::news_setting.main_cuff') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('mini_cuff', trans('news::news_setting.mini_cuff'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('mini_cuff', $records->where('attribute_key','mini_cuff')->first()->attribute_value, ['placeholder' => trans('news::news_setting.mini_cuff') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('find_tags_in_content', trans('news::news_setting.find_tags_in_content'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('find_tags_in_content', $records->where('attribute_key','find_tags_in_content')->first()->attribute_value, ['placeholder' => trans('news::news_setting.find_tags_in_content') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('automatic_add_tags', trans('news::news_setting.automatic_add_tags'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('automatic_add_tags', $records->where('attribute_key','automatic_add_tags')->first()->attribute_value, ['placeholder' => trans('news::news_setting.automatic_add_tags') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('is_show_previous_and_next_news', trans('news::news_setting.is_show_previous_and_next_news'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('is_show_previous_and_next_news', $records->where('attribute_key','is_show_previous_and_next_news')->first()->attribute_value, ['placeholder' => trans('news::news_setting.is_show_previous_and_next_news') ,'class' => 'form-control']) !!}
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
                    {!! Form::close() !!}
                </div>
            </div>
        </div><!-- end row -->
        <!-- Main Content Element  End-->
    </div><!-- end container-fluid -->
@endsection
