@extends($activeTheme .'::backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!--Top header start-->
                <h3 class="ls-top-header">{{trans('news::news.managment')}}</h3>
            <!--Top header end -->

            <!--Top breadcrumb start -->
            <ol class="breadcrumb">
                <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! URL::route('news.index') !!}"> {{ trans('news::news.news_list') }} </a></li>
                <li class="active"> {{ trans('news::common.add_update') }}</li>
            </ol>
            <!--Top breadcrumb start -->
        </div>
    </div>

    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['news.update', $record], 'method' => 'PATCH', 'files' => 'true','enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'news.store','method' => 'post', 'files' => 'true','enctype' => 'multipart/form-data']) !!}
    @endif
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">
            @include($activeTheme . '::backend.partials._rivisions', ['rivisions' => $record->revisionHistory])
            <div class="panel panel-light-blue">
                <div class="panel-heading">
                    {{--/<h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>--}}
                </div>

                <div class="panel-body">

                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('country_id', trans('news::news.country_id'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('country_id', $countryList , $record->country_id , ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('city_id', trans('news::news.city_id'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('city_id', $cityList , $record->city_id , ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('news_resource_id', trans('news::news.news_source_id'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('news_source_id', $newsSourceList , $record->news_source_id , ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('title', trans('news::news.title'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('title', $record->title, ['placeholder' => trans('news::news.title') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('small_title', trans('news::news.small_title'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('small_title', $record->small_title, ['placeholder' => trans('news::news.small_title') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('slug', trans('news::news.slug'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('slug', $record->slug, ['placeholder' => trans('news::news.slug') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('spot', trans('news::news.spot'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('spot', $record->spot, ['placeholder' => trans('news::news.spot') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('content', trans('news::news.content'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('content', $record->content, ['placeholder' => trans('news::news.content') ,'class' => 'form-control content']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('description', trans('news::news.description'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('description', $record->description, ['placeholder' => trans('news::news.description') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('keywords', trans('news::news.keywords'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('keywords', $record->keywords, ['placeholder' => trans('news::news.keywords') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('meta_tags', trans('news::news.meta_tags'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('meta_tags', $record->meta_tags, ['placeholder' => trans('news::news.meta_tags') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('cuff_photo', trans('news::news.cuff_photo'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::file('cuff_photo') !!}
                                <img id="cuff_photo_preview" src="#" style="width:100px;height:100px;" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('thumbnail', trans('news::news.thumbnail'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::file('thumbnail') !!}
                                <img id="thumbnail_preview" src="#" style="width:100px;height:100px;" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('cuff_direct_link', trans('news::news.cuff_direct_link'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('cuff_direct_link', $record->cuff_direct_link, ['placeholder' => trans('news::news.cuff_direct_link') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('video_embed', trans('news::news.video_embed'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('video_embed', $record->video_embed, ['placeholder' => trans('news::news.video_embed') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('hit', trans('news::news.hit'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::number('hit', $record->hit, ['placeholder' => trans('news::news.hit') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('status', trans('news::news.status'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('status', $statusList , $record->status , ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('news_type', trans('news::news.news_type'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('news_type', $newsTypes , $record->news_type, ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::news.find_tags_in_content')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('find_tags_in_content', null , isset($record->id) ? $record->find_tags_in_content : Redis::get('find_tags_in_content') ) !!}
                                        <i></i> {{trans('news::news.find_tags_in_content')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::news.automatic_add_tags')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('automatic_add_tags', null , isset($record->id) ? 0 :  Redis::get('automatic_add_tags') ) !!}
                                        <i></i> {{trans('news::news.automatic_add_tags')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::news.band_news')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('band_news', null , $record->band_news) !!}
                                        <i></i> {{trans('news::news.band_news')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::news.box_cuff')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('box_cuff', null , $record->box_cuff) !!}
                                        <i></i> {{trans('news::news.box_cuff')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::news.band_news')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                                        <i></i> {{trans('news::news.is_cuff')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::news.break_news')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('break_news', null , $record->break_news) !!}
                                        <i></i> {{trans('news::news.break_news')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::news.is_comment')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('is_comment', null , $record->is_comment) !!}
                                        <i></i> {{trans('news::news.is_comment')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::news.is_show_editor_profile')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('is_show_editor_profile', null , isset($record->id) ? $record->is_show_editor_profile_in_news :  Redis::get('is_show_editor_profile_in_news')) !!}
                                        <i></i> {{trans('news::news.is_show_editor_profile')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::news.is_show_previous_and_next_news')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('is_show_previous_and_next_news', null ,  isset($record->id) ? $record->is_show_previous_and_next_news  : Redis::get('is_show_previous_and_next_news') ) !!}
                                        <i></i> {{trans('news::news.is_show_previous_and_next_news')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::news.band_news')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('main_cuff', null , $record->main_cuff) !!}
                                        <i></i> {{trans('news::news.main_cuff')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::news.mini_cuff')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('mini_cuff', null , $record->mini_cuff) !!}
                                        <i></i> {{trans('news::news.mini_cuff')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::common.status')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                        <i></i> {{trans('news::common.is_active')}}
                                    </label>
                                </div>
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


        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('news::news.select_categories') }}</h3>
                </div>
                        <!-- /.box-header -->
                <div class="box-body">
                        <div class="form-group">
                            {!! Form::select('news_category_ids[]', $newsCategoryList , $newsCategoryIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                        </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('news::news.future_datetime') }}</h3>
                </div>
                        <!-- /.box-header -->
                <div class="box-body">
                    {{--<form role="form">--}}

                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('future_datetime', trans('news::news.future_datetime'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('future_datetime', isset($futureNews) ? $futureNews->future_datetime : null , ['placeholder' => trans('news::news.future_datetime') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::news.future_news__is_active')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('future_news__is_active', null , isset($futureNews) ? $futureNews->is_active : null) !!}
                                        <i></i> {{trans('news::news.future_news__is_active')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('news::news.recommendation_news') }}</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">

                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('recommendation_news_order', trans('news::news.recommendation_news_order'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::number('recommendation_news_order', isset($recommendationNews) ?  $recommendationNews->order : null, ['placeholder' => trans('news::news.recommendation_news_order') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::news.recommendation_news_is_cuff')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('recommendation_news_is_cuff', null , isset($recommendationNews) ? $recommendationNews->is_cuff : null) !!}
                                        <i></i> {{trans('news::news.recommendation_news_is_cuff')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::news.recommendation_news_is_active')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('recommendation_news_is_active', null , isset($recommendationNews) ? $recommendationNews->is_active : null) !!}
                                        <i></i> {{trans('news::news.recommendation_news_is_active')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('news::news.related_news') }}</h3>
                </div>

            <!-- /.box-header -->
                <div class="box-body">

                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('related_news_id', trans('news::news.related_news_id'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('related_news_ids[]', $newsList , $relatedIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('news::news.tags') }}</h3>
                </div>

            <!-- /.box-header -->
                <div class="box-body">
                    {{--<form role="form">--}}

                    {!!  Form::hidden('news_id', $record->id) !!}

                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('tags', trans('news::news.tags'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('tags_ids[]', $tagList , $tagIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('news::news.photo_galleries') }}</h3>
                </div>
                        <!-- /.box-header -->
                <div class="box-body">
                    {{--<form role="form">--}}

                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('photo_galleries', trans('news::news.photo_galleries'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('photo_gallery_ids[]', $photoGalleriesList , $photoGalleryIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('news::news.video_galleries') }}</h3>
                </div>
                        <!-- /.box-header -->
                <div class="box-body">
                    {{--<form role="form">--}}

                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('video_galleries', trans('news::news.video_galleries'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('video_gallery_ids[]', $videoGalleriesList , $videoGalleryIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('news::news.videos') }}</h3>
                </div>
                        <!-- /.box-header -->
                <div class="box-body">
                    {{--<form role="form">--}}

                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('videos', trans('news::news.videos'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('videos_ids[]', $videoList , $videosIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('news::news.photos') }}</h3>
                </div>
                        <!-- /.box-header -->
                <div class="box-body">
                    {{--<form role="form">--}}
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('photos', trans('news::news.photos'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('photos_ids[]', $photoList , $photosIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div><!-- end row -->

    {!! Form::close() !!}
    <!-- Main Content Element  End-->
</div><!-- end container-fluid -->


@endsection


@section('css')
    <link href="{{ Theme::asset('default-theme::AdminLTE/plugins/select2/select2.min.css') }}" rel="stylesheet">

    <style type="text/css">
        #cuff_photo_preview {display: none;}
        .display {display: block !important;}

        #thumbnail_preview {display: none;}
        .display {display: block !important;}
    </style>

@endsection


@section('js')


    <script src="{{ Theme::asset('default-theme::AdminLTE/plugins/select2/select2.full.min.js') }}"></script>

    {{--<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>--}}

    {{--<script>--}}
    {{--CKEDITOR.replace( 'content', {--}}
    {{--filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',--}}
    {{--filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',--}}
    {{--filebrowserBrowseUrl: '/laravel-filemanager?type=Files',--}}
    {{--filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'--}}
    {{--});--}}
    {{--</script>--}}


    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    {{--<textarea name="content" class="form-control my-editor">{!! old('content', $content) !!}</textarea>--}}
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea.content",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
        });
    </script>



    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                $( "#cuff_photo_preview" ).addClass( "display" );

                reader.onload = function (e) {
                    $('#cuff_photo_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#cuff_photo").change(function(){
            readURL(this);
        });

        $("#thumbnail").change(function(){
            readURL(this);
        });

    </script>


@endsection