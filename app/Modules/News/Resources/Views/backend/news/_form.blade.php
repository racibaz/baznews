@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::news.management')}}
            <small>{{trans('news::news.news_create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('news.index') !!}">{{trans('news::news.management')}}</a></li>
            <li class="active">{{trans('news::news.news_create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['news.update', $record], 'method' => 'PATCH', 'files' => 'true','enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'news.store','method' => 'post', 'files' => 'true','enctype' => 'multipart/form-data']) !!}
    @endif
    <!-- Main Content Element  Start-->

    <div class="modal fade" id="activity-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{trans('news::news.changed_timeline')}}</h4>
                </div>
                <div class="modal-body">
                    @include($activeTheme . '::backend.partials._rivisions', ['rivisions' => $record->revisionHistory])
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{trans('news::news.close')}}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="row">
        <div class="col-lg-8" id="content-area">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-file-text"></i> {{trans('news::news.content')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('title', trans('news::news.title'),['class'=> 'control-label']) !!}
                                {!! Form::text('title', $record->title, ['placeholder' => trans('news::news.title') ,'class' => 'form-control']) !!}
                            </div>
                        </div><!-- /.col-lg-12 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('short_url', trans('news::news.short_url'),['class'=> 'control-label']) !!}
                                {{--{!! Form::text('short_url', $record->short_url, ['placeholder' => trans('news::news.short_url') ,'class' => 'form-control', 'disabled' => 'disabled' ]) !!}--}}
                                {{$record->short_url}}
                            </div><!-- /.form-group -->
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('spot', trans('news::news.spot'),['class'=> 'control-label']) !!}
                                {!! Form::textarea('spot', $record->spot, ['placeholder' => trans('news::news.spot') ,'class' => 'form-control']) !!}
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('small_title', trans('news::news.small_title'),['class'=> 'control-label']) !!}
                                {!! Form::text('small_title', $record->small_title, ['placeholder' => trans('news::news.small_title') ,'class' => 'form-control']) !!}
                            </div>
                        </div><!-- /.col-lg-6 -->

                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('news_resource_id', trans('news::news.news_source_id'),['class'=> 'control-label']) !!}
                                {!! Form::select('news_source_id', $newsSourceList , $record->news_source_id , ['placeholder' => trans('news::news.please_choose'),'class' => 'form-control select2']) !!}
                            </div>
                        </div><!-- /.col-lg-6 -->

                        <div class="col-lg-12">

                            <div class="form-group">
                                {!! Form::label('content', trans('news::news.content'),['class'=> 'control-label']) !!}
                                {!! Form::textarea('content', $record->content, ['placeholder' => trans('news::news.content') ,'class' => 'form-control summernote ']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', trans('news::news.description'),['class'=> 'control-label']) !!}
                                {!! Form::textarea('description', $record->description, ['placeholder' => trans('news::news.description') ,'class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('meta_tags', trans('news::news.meta_tags'),['class'=> 'control-label']) !!}
                                {!! Form::textarea('meta_tags', $record->meta_tags, ['placeholder' => trans('news::news.meta_tags') ,'class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('cuff_direct_link', trans('news::news.cuff_direct_link'),['class'=> ' control-label']) !!}
                                {!! Form::text('cuff_direct_link', $record->cuff_direct_link, ['placeholder' => trans('news::news.cuff_direct_link') ,'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('video_embed', trans('news::news.video_embed'),['class'=> ' control-label']) !!}
                                {!! Form::textarea('video_embed', $record->video_embed, ['placeholder' => trans('news::news.video_embed') ,'class' => 'form-control']) !!}
                            </div>
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div><!-- /.col-lg-12 -->
        <div class="col-lg-4" id="sidebar">

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-map-pin"></i> {{trans('news::news.location')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('country_id', trans('news::news.country_id'),['class'=> 'control-label']) !!}
                                {!! Form::select('country_id', $countryList , $record->country_id , ['placeholder' => trans('news::news.please_choose'),'class' => 'form-control select2']) !!}
                            </div>
                        </div><!-- /.col-lg-12 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('city_id', trans('news::news.city_id'),['class'=> 'control-label']) !!}
                                {!! Form::select('city_id', $cityList , $record->city_id , ['placeholder' => trans('news::news.please_choose'),'class' => 'form-control select2']) !!}
                            </div>
                        </div><!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-edit"></i> {{trans('news::news.status')}}</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('news_type', trans('news::news.news_type'),['class'=> ' control-label']) !!}
                                {!! Form::select('news_type', $newsTypes , $record->news_type, ['placeholder' => trans('news::news.please_choose'),'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('news_category_ids[]', trans('news::news.categories'),['class'=> 'control-label']) !!}
                                {!! Form::select('news_category_ids[]', $newsCategoryList , $newsCategoryIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('status', trans('news::news.status'),['class'=> ' control-label']) !!}
                                {!! Form::select('status', $statusList , $record->status , ['placeholder' => trans('news::news.please_choose'),'class' => 'form-control']) !!}
                            </div>
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <a class="btn btn-primary" data-toggle="modal" href="#activity-modal"><i
                                    class="fa fa-clock-o"></i> {{trans('news::news.changed_timeline')}}</a>
                        <button class="btn btn-success btn-lg pull-right" type="submit"><i
                                    class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                    </div>
                </div><!-- /.box-footer -->
            </div>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-edit"></i> {{trans('news::news.keywords')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('keywords', trans('news::news.keywords'),['class'=> 'control-label','style'=>'width:100%']) !!}
                                {!! Form::text('keywords', $record->keywords, ['placeholder' => trans('news::news.keywords') ,'class' => 'form-control tagsinput']) !!}
                            </div>
                        </div><!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.box-body -->
            </div><!-- /.box -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-calendar"></i> {{ trans('news::news.future_datetime') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('future_datetime', trans('news::news.future_datetime'),['class'=> ' control-label']) !!}
                        {!! Form::text('future_datetime', isset($futureNews) ? $futureNews->future_datetime : null , ['placeholder' => trans('news::news.future_datetime') ,'class' => 'form-control','id'=>'show_time']) !!}
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('future_news__is_active', null , isset($futureNews) ? $futureNews->is_active : null) !!}
                            {{trans('news::news.future_news__is_active')}}
                        </label>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-cogs"></i> {{trans('news::news.other_settings')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('band_news', null , $record->band_news) !!}
                                    {{trans('news::news.band_news')}}
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('box_cuff', null , $record->box_cuff) !!}
                                    {{trans('news::news.box_cuff')}}
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('break_news', null , $record->break_news) !!}
                                    {{trans('news::news.break_news')}}
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('main_cuff', null , $record->main_cuff) !!}
                                    {{trans('news::news.main_cuff')}}
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('mini_cuff', null , $record->mini_cuff) !!}
                                    {{trans('news::news.mini_cuff')}}
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('is_comment', null , $record->is_comment) !!}
                                    {{trans('news::news.is_comment')}}
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('is_show_editor_profile', null , isset($record->id) ? $record->is_show_editor_profile_in_news :  Redis::get('is_show_editor_profile_in_news')) !!}
                                    {{trans('news::news.is_show_editor_profile')}}
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('is_show_previous_and_next_news', null ,  isset($record->id) ? $record->is_show_previous_and_next_news  : Redis::get('is_show_previous_and_next_news') ) !!}
                                    {{trans('news::news.is_show_previous_and_next_news')}}
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('find_tags_in_content', null , isset($record->id) ? $record->find_tags_in_content : Redis::get('find_tags_in_content') ) !!}
                                    {{trans('news::news.find_tags_in_content')}}
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('automatic_add_tags', null , isset($record->id) ? 0 :  Redis::get('automatic_add_tags') ) !!}
                                    {{trans('news::news.automatic_add_tags')}}
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                                    {{trans('news::news.is_cuff')}}
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    {!! Form::checkbox('is_ping', null , false) !!}
                                    {{trans('news::news.is_ping')}}
                                </label>
                            </div>
                        </div><!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-image"></i> {{trans('news::news.thumbnail_image')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group">
                                {!! Form::label('cuff_photo', trans('news::news.cuff_photo'),['class'=> 'control-label','style'=>'width:100%']) !!}
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                         style="width: 200px; height: 150px;">
                                        <img src="{{ asset('images/news_images/' . $record->id . '/cuff_photo/' . $record->cuff_photo)}}"/>
                                    </div>
                                    <div>
                                        <span class="btn btn-default btn-file"><span
                                                    class="fileinput-new">{{trans('news::news.select_image')}}</span><span
                                                    class="fileinput-exists">{{trans('news::news.change')}}</span>{!! Form::file('cuff_photo') !!}</span>
                                        <a href="#" class="btn btn-default fileinput-exists"
                                           data-dismiss="fileinput">{{trans('news::news.remove')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col-lg-12 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('thumbnail', trans('news::news.thumbnail'),['class'=> 'control-label','style'=>'width:100%']) !!}
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                         style="width: 200px; height: 150px;">
                                        <img src="{{ asset('images/news_images/' . $record->id . '/thumbnail/' . $record->thumbnail)}}"/>
                                    </div>
                                    <div>
                                        <span class="btn btn-default btn-file"><span
                                                    class="fileinput-new">{{trans('news::news.select_image')}}</span><span
                                                    class="fileinput-exists">{{trans('news::news.change')}}</span>{!! Form::file('thumbnail') !!}</span>
                                        <a href="#" class="btn btn-default fileinput-exists"
                                           data-dismiss="fileinput">{{trans('news::news.remove')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-image"></i> {{ trans('news::news.photos') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('photos', trans('news::news.photos'),['class'=> ' control-label']) !!}
                        {!! Form::select('photos_ids[]', $photoList , $photosIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-file-video-o"></i> {{ trans('news::news.videos') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('videos', trans('news::news.videos'),['class'=> ' control-label']) !!}
                        {!! Form::select('videos_ids[]', $videoList , $videosIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i
                                class="glyphicon glyphicon-facetime-video"></i> {{ trans('news::news.video_galleries') }}
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('video_galleries', trans('news::news.video_galleries'),['class'=> ' control-label']) !!}
                        {!! Form::select('video_gallery_ids[]', $videoGalleriesList , $videoGalleryIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-image"></i> {{ trans('news::news.photo_galleries') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('photo_galleries', trans('news::news.photo_galleries'),['class'=> ' control-label']) !!}
                        {!! Form::select('photo_gallery_ids[]', $photoGalleriesList , $photoGalleryIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-tags"></i> {{ trans('news::news.tags') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!!  Form::hidden('news_id', $record->id) !!}
                    <div class="form-group">
                        {!! Form::label('tags', trans('news::news.tags'),['class'=> ' control-label']) !!}
                        {!! Form::select('tags_ids[]', $tagList , $tagIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-refresh"></i> {{ trans('news::news.related_news') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('related_news_id', trans('news::news.related_news_id'),['class'=> 'control-label']) !!}
                        {!! Form::select('related_news_ids[]', $newsList , $relatedIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-globe"></i> {{ trans('news::news.recommendation_news') }}</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">

                    <div class="form-group">
                        {!! Form::label('recommendation_news_order', trans('news::news.recommendation_news_order'),['class'=> ' control-label']) !!}
                        {!! Form::number('recommendation_news_order', isset($recommendationNews) ?  $recommendationNews->order : null, ['placeholder' => trans('news::news.recommendation_news_order') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('recommendation_news_is_cuff', null , isset($recommendationNews) ? $recommendationNews->is_cuff : null) !!}
                            {{trans('news::news.recommendation_news_is_cuff')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('recommendation_news_is_active', null , isset($recommendationNews) ? $recommendationNews->is_active : null) !!}
                            <i></i> {{trans('news::news.recommendation_news_is_active')}}
                        </label>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    {!! Form::close() !!}
    <!-- Main Content Element  End-->
@endsection
@section('css')
    <link rel="stylesheet"
          href="{{ Theme::asset($activeTheme . '::js/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ Theme::asset($activeTheme . '::js/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ Theme::asset($activeTheme . '::js/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet"
          href="{{ Theme::asset($activeTheme .'::js/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}"
          rel="stylesheet">
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme .'::js/moment/min/moment.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme .'::js/moment/locale/tr.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme .'::js/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme .'::js/ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript">
        //CKEDİTOR START
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
            language: 'tr'
        };
        CKEDITOR.replace('content', options);
        //CKEDİTOR END...

        $(document).ready(function () {
            $('.fileinput').fileinput();
            $('.select2').select2();
            $('.tagsinput').tagsinput();
            //Date range picker with time picker
            $('#show_time').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                locale: 'tr'
            });
        });
        $(window).resize(function () {
            $('.select2').select2();
            $('.tagsinput').tagsinput();
        });
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#content-area,#sidebar').theiaStickySidebar();
        });
        //active menu
        activeMenu('news', 'news_management');
    </script>
@endsection