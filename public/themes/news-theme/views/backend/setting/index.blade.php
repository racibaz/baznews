@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('setting.general')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li class="active"><a href="{!! URL::route('setting.index') !!}"> {{trans('setting.general')}}</a></li>
        </ol>
    </section>
@endsection
@section('content')
    <!-- Main Content Element  Start-->
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['setting.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'setting.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <div class="row">
        <div class="col-sm-7 col-md-9" id="content">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab"
                                          aria-expanded="true">{{trans('setting.general')}}</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab"
                                    aria-expanded="false">{{trans('setting.google')}}</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab"
                                    aria-expanded="false">{{trans('setting.social_connect')}}</a></li>
                    <li class=""><a href="#tab_4" data-toggle="tab"
                                    aria-expanded="false">{{trans('setting.tab_contact')}}</a></li>
                    <li class=""><a href="#tab_5" data-toggle="tab"
                                    aria-expanded="false">{{trans('setting.embed_code')}}</a></li>
                    <li class=""><a href="#tab_6" data-toggle="tab"
                                    aria-expanded="false">{{trans('setting.header_footer')}}</a></li>
                    <li class=""><a href="#tab_7" data-toggle="tab" aria-expanded="false">{{trans('setting.other')}}</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('lbl_country_id', trans('setting.country'),['class'=> 'control-label']) !!}
                                    {!! Form::select('country_id', $countryList , $records->where('attribute_key','country')->first()->attribute_value , ['class' => 'form-control select2']) !!}
                                </div><!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('lbl_city_id', trans('setting.city'),['class'=> 'control-label']) !!}
                                    {!! Form::select('city_id', $cityList , $records->where('attribute_key','city')->first()->attribute_value , ['class' => 'form-control select2']) !!}
                                </div><!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('language_code', trans('setting.language_code'),['class'=> 'control-label']) !!}
                                    {!! Form::select('language_code', $languageList , $records->where('attribute_key','language_code')->first()->attribute_value , ['class' => 'form-control select2']) !!}
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('title', trans('setting.title'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('title', $records->where('attribute_key','title')->first()->attribute_value, ['placeholder' => trans('setting.title') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('slogan', trans('setting.slogan'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('slogan', $records->where('attribute_key','slogan')->first()->attribute_value, ['placeholder' => trans('setting.slogan') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('url', trans('setting.url'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('url', $records->where('attribute_key','url')->first()->attribute_value, ['placeholder' => trans('setting.url') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('description', trans('setting.description'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('description', $records->where('attribute_key','description')->first()->attribute_value, ['placeholder' => trans('setting.description') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('keywords', trans('setting.keywords'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('keywords', $records->where('attribute_key','keywords')->first()->attribute_value, ['placeholder' => trans('setting.keywords') ,'class' => 'form-control tagsinput']) !!}
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('timezone', trans('setting.timezone'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::select('timezone', $timezoneList , $records->where('attribute_key','timezone')->first()->attribute_value , ['class' => 'form-control select2']) !!}
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('logo', trans('setting.logo'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    <strong>{{trans('setting.recommended_logo_size')}} (90x90)</strong><br><br>

                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                             style="width: 200px; height: 150px;">
                                            <img src="{!! asset('img/logo.jpg') !!}" alt="">
                                        </div>
                                        <div>
                                            <span class="btn btn-default btn-file"><span
                                                        class="fileinput-new">{{trans('setting.file_choose')}}</span><span
                                                        class="fileinput-exists">{{trans('setting.change')}}</span>{!! Form::file('logo',['class'=>'fileinput']) !!}</span>
                                            <a href="#" class="btn btn-default fileinput-exists"
                                               data-dismiss="fileinput">{{trans('setting.remove')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('favicon', trans('setting.favicon'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput">
                                            <img src="{!! asset('favicon.ico') !!}" alt="">
                                        </div>
                                        <div>
                                            <span class="btn btn-default btn-file"><span
                                                        class="fileinput-new">{{trans('setting.file_choose')}}</span><span
                                                        class="fileinput-exists">{{trans('setting.change')}}</span>{!! Form::file('favicon',['class'=>'fileinput']) !!}</span>
                                            <a href="#" class="btn btn-default fileinput-exists"
                                               data-dismiss="fileinput">{{trans('setting.remove')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('abstract_text', trans('setting.abstract_text'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('abstract_text', $records->where('attribute_key','abstract_text')->first()->attribute_value, ['placeholder' => trans('setting.abstract_text') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('copyright', trans('setting.copyright'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('copyright', $records->where('attribute_key','copyright')->first()->attribute_value, ['placeholder' => trans('setting.copyright') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <strong>
                                        {{trans('setting.user_contract_force')}}
                                    </strong>
                                </div>
                                <div class="col-lg-10">
                                    <label>
                                        {!! Form::checkbox('user_contract_force', null , $records->where('attribute_key','user_contract_force')->first()->attribute_value) !!}
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <strong>
                                        {{trans('setting.user_registration_type')}}
                                    </strong>
                                </div>
                                <div class="col-lg-10">
                                    <label>
                                        <div class="form-group">
                                            {!! Form::select('user_registration_type', [\App\Models\Setting::PUBLIC => trans('setting.public'),
                                                                                        \App\Models\Setting::PRIVATE => trans('setting.private'),
                                                                                        \App\Models\Setting::VERIFIED => trans('setting.verified'),
                                                                                        \App\Models\Setting::NONE => trans('setting.none')],
                                                                                         $records->where('attribute_key','user_registration_type')->first()->attribute_value,
                                                                                        ['class' => 'form-control']) !!}
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <strong>
                                        {{trans('setting.user_default_role')}}
                                    </strong>
                                </div>
                                <div class="col-lg-10">
                                    <label>
                                        <div class="form-group">
                                            {!! Form::select('user_default_role',
                                                                                $roleList->pluck('name', 'id'),
                                                                                $records->where('attribute_key','user_default_role')->first()->attribute_value,
                                                                                ['class' => 'form-control']) !!}
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <strong>
                                        {{trans('setting.user_default_group')}}
                                    </strong>
                                </div>
                                <div class="col-lg-10">
                                    <label>
                                        <div class="form-group">
                                            {!! Form::select('user_default_group',
                                                                                $groupList->pluck('name', 'id') ,
                                                                                $records->where('attribute_key','user_default_group')->first()->attribute_value,
                                                                                ['class' => 'form-control']) !!}
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('user_contract', trans('setting.user_contract'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('user_contract', $records->where('attribute_key','user_contract')->first()->attribute_value, ['placeholder' => trans('setting.slogan') ,'class' => 'form-control summernote']) !!}
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('google_recaptcha_site_key', trans('setting.google_recaptcha_site_key'),['class'=> 'control-label']) !!}
                                    {!! Form::text('google_recaptcha_site_key', $records->where('attribute_key','google_recaptcha_site_key')->first()->attribute_value, ['placeholder' => trans('setting.google_recaptcha_site_key') ,'class' => 'form-control']) !!}
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    {!! Form::label('google_recaptcha_secret_key', trans('setting.google_recaptcha_secret_key'),['class'=> 'control-label']) !!}
                                    {!! Form::text('google_recaptcha_secret_key', $records->where('attribute_key','google_recaptcha_secret_key')->first()->attribute_value, ['placeholder' => trans('setting.google_recaptcha_secret_key') ,'class' => 'form-control']) !!}
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    {!! Form::label('google_url_shortener_key', trans('setting.google_url_shortener_key'),['class'=> 'control-label']) !!}
                                    {!! Form::text('google_url_shortener_key', $records->where('attribute_key','google_url_shortener_key')->first()->attribute_value, ['placeholder' => trans('setting.google_url_shortener_key') ,'class' => 'form-control']) !!}
                                </div><!-- /.form-group -->
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('facebook', trans('setting.facebook'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('facebook', $records->where('attribute_key','facebook')->first()->attribute_value, ['placeholder' => trans('setting.facebook') ,'class' => 'form-control','rows'=>'2']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('facebook_embed_code', trans('setting.facebook_embed_code'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('facebook_embed_code', $records->where('attribute_key','facebook_embed_code')->first()->attribute_value, ['placeholder' => trans('setting.facebook_embed_code') ,'class' => 'form-control','rows'=>'4']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('twitter', trans('setting.twitter'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('twitter', $records->where('attribute_key','twitter')->first()->attribute_value, ['placeholder' => trans('setting.twitter') ,'class' => 'form-control','rows'=>'2']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('twitter_embed_code', trans('setting.twitter_embed_code'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('twitter_embed_code', $records->where('attribute_key','twitter_embed_code')->first()->attribute_value, ['placeholder' => trans('setting.twitter_embed_code') ,'class' => 'form-control','rows'=>'4']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('instagram', trans('setting.instagram'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('instagram', $records->where('attribute_key','instagram')->first()->attribute_value, ['placeholder' => trans('setting.instagram') ,'class' => 'form-control','rows'=>'2']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('instagram_embed_code', trans('setting.instagram_embed_code'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('instagram_embed_code', $records->where('attribute_key','instagram_embed_code')->first()->attribute_value, ['placeholder' => trans('setting.instagram_embed_code') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('pinterest', trans('setting.pinterest'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('pinterest', $records->where('attribute_key','pinterest')->first()->attribute_value, ['placeholder' => trans('setting.pinterest') ,'class' => 'form-control','rows'=>'2']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('pinterest_embed_code', trans('setting.pinterest_embed_code'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('pinterest_embed_code', $records->where('attribute_key','pinterest_embed_code')->first()->attribute_value, ['placeholder' => trans('setting.pinterest_embed_code') ,'class' => 'form-control','rows'=>'2']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="tab_4">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    {!! Form::label('contact', trans('setting.contact'),['class'=> ' control-label']) !!}
                                    {!! Form::textarea('contact', $records->where('attribute_key','contact')->first()->attribute_value, ['placeholder' => trans('setting.contact') ,'class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('latitude', trans('setting.latitude'),['class'=> 'control-label']) !!}
                                        {!! Form::text('latitude', $records->where('attribute_key','latitude')->first()->attribute_value, ['placeholder' => trans('setting.latitude') ,'class' => 'form-control']) !!}
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('longitude', trans('setting.longitude'),['class'=> 'control-label']) !!}
                                        {!! Form::text('longitude', $records->where('attribute_key','longitude')->first()->attribute_value, ['placeholder' => trans('setting.longitude') ,'class' => 'form-control']) !!}
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-12">
                                    <div id="map" style="height: 300px;"></div>
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_5">
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('weather_embed_code', trans('setting.weather_embed_code'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('weather_embed_code', $records->where('attribute_key','weather_embed_code')->first()->attribute_value, ['placeholder' => trans('setting.weather_embed_code') ,'class' => 'form-control','id'=>'weather_code']) !!}
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('addthis', trans('setting.addthis'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('addthis', $records->where('attribute_key','addthis')->first()->attribute_value, ['placeholder' => trans('setting.addthis') ,'class' => 'form-control','id'=>'addthis_code']) !!}
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('disqus', trans('setting.disqus'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('disqus', $records->where('attribute_key','disqus')->first()->attribute_value, ['placeholder' => trans('setting.disqus') ,'class' => 'form-control','id'=>'disqus_code']) !!}
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_6">
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('head_code', trans('setting.head_code'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('head_code', $records->where('attribute_key','head_code')->first()->attribute_value, ['placeholder' => trans('setting.head_code') ,'class' => 'form-control','id'=>'head_code']) !!}
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('footer_code', trans('setting.footer_code'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('footer_code', $records->where('attribute_key','footer_code')->first()->attribute_value, ['placeholder' => trans('setting.footer_code') ,'class' => 'form-control','id'=>'footer_code']) !!}
                                </div>
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('footer_text', trans('setting.footer_text'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('footer_text', $records->where('attribute_key','footer_text')->first()->attribute_value, ['placeholder' => trans('setting.footer_text') ,'class' => 'form-control footer-text']) !!}
                                </div>
                            </div>
                        </div><!-- /.form-group -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_7">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('sitemap_count', trans('setting.sitemap_count'),['class'=> 'control-label']) !!}
                                    {!! Form::number('sitemap_count', $records->where('attribute_key','sitemap_count')->first()->attribute_value, ['placeholder' => trans('setting.sitemap_count') ,'class' => 'form-control']) !!}
                                </div><!-- /.form-group -->
                            </div>
                            <div class="col-xs-6 col-lg-3">
                                <div class="form-group">
                                    {!! Form::label('is_url_shortener', trans('setting.is_url_shortener'),['class'=> 'control-label']) !!}
                                    {!! Form::select('is_url_shortener', ['false' => trans('common.passive'), 'true' => trans('common.active')],
                                    $records->where('attribute_key','is_url_shortener')->first()->attribute_value,
                                     ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('allow_photo_formats', trans('setting.allow_photo_formats'),['class'=> 'control-label']) !!}
                                    <br>
                                    {!! Form::text('allow_photo_formats', $records->where('attribute_key','allow_photo_formats')->first()->attribute_value, ['placeholder' => trans('setting.allow_photo_formats') ,'class' => 'form-control tagsinput']) !!}
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    {!! Form::label('allow_video_formats', trans('setting.allow_video_formats'),['class'=> 'control-label']) !!}
                                    <br>
                                    {!! Form::text('allow_video_formats', $records->where('attribute_key','allow_video_formats')->first()->attribute_value, ['placeholder' => trans('setting.allow_video_formats') ,'class' => 'form-control tagsinput']) !!}
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-content -->

            </div>
            <!-- nav-tabs-custom -->
        </div>
        <div class="col-sm-5 col-md-3" id="sidebar">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('setting.status')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="list-group">
                        <a class="list-group-item" data-toggle="modal" href="#config_list"><i
                                    class="fa fa-cog"></i>{{trans('setting.config_list')}}</a>
                        <a class="list-group-item" href="{!! route('repairMysqlTables') !!}"><i
                                    class="fa fa-thumbs-o-up"></i> <span>Mysql Tabloları Onar</span></a>
                        <a class="list-group-item" href="{!! route('getAllRedisKey') !!}"><i class="fa fa-list-alt"></i>
                            <span>Cache Verileri Göster</span></a>
                        <a class="list-group-item" href="{!! route('flushAllCache') !!}"><i class="fa fa-trash-o"></i>
                            <span>Cache Verilerini Sil</span></a>
                        <a class="list-group-item" href="{!! route('getBackUp') !!}"> <i
                                    class="fa fa-cloud-download"></i> <span>Backup Al</span></a>
                        <a class="list-group-item" href="{!! route('backUpClean') !!}"> <i class="fa fa-trash-o"></i>
                            <span>Backup ları Sil</span></a>
                        <a class="list-group-item" href="{!! route('viewClear') !!}"> <i class="fa fa-trash-o"></i>
                            <span>View Ön Belleğini Temizle</span></a>
                        <a class="list-group-item" href="{!! route('routeCache') !!}"> <i class="fa fa-trash-o"></i>
                            <span>Route Ayarlarını Ön Belleğe Al</span></a>
                        <a class="list-group-item" href="{!! route('routeClear') !!}"> <i class="fa fa-trash-o"></i>
                            <span>Route Ön Belleğini Temizle</span></a>
                        <a class="list-group-item" href="{!! route('configCache') !!}"><i class="fa fa-trash-o"></i>
                            <span>Konfigürasyon Ayarlarını Ön Belleğe Al</span></a>
                        <a class="list-group-item" href="{!! route('configClear') !!}"> <i class="fa fa-trash-o"></i>
                            <span>Konfigürasyon Ayarlarını Temizle</span></a>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-success pull-right" type="submit"><i
                                            class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-footer -->

                <!-- /.box-body -->
            </div>
        </div>
    </div><!-- end row -->
    {!! Form::close() !!}



    <div class="modal fade" id="config_list">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{trans('setting.config_list')}}</h4>
                </div>
                <div class="modal-body" style="padding: 0;">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover" style="margin-bottom: 0;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th width="12%">{{trans('setting.attribute_key')}}</th>
                                <th>{{trans('setting.attribute_value')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('setting.show', $record->attribute_key , $record, [] ) !!}</td>
                                    <td> {{ $record->attribute_value  }} </td>
                                    <td>
                                        <div class="btn-group">
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('setting.destroy',  $record))) !!}
                                            {!! link_to_route('setting.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
                                            {!! Form::submit('Sil', ['class' => 'btn btn-danger btn-xs','data-toggle'=>'confirmation']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{trans('setting.attribute_key')}}</th>
                                <th>{{trans('setting.attribute_value')}}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div style="margin-bottom: 20px;">
                                <a href="{{ route('setting.create') }}" class="btn btn-success">
                                    <i class="fa fa-plus"></i> {{ trans('common.create') }}
                                </a>
                            </div>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"><strong>{{trans('setting.general')}}</strong></h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">


                                    <div>
                                        <h1>activeTheme :</h1> {{$activeTheme}} <br>
                                        <h1> themes : </h1>
                                        @foreach($themes as $theme)
                                            {{$theme['name']}} <br/>
                                        @endforeach
                                        <br><br><br><br><br>

                                        <h1> modulesCount : </h1> {{$modulesCount}}
                                        <br>
                                        <h1> modules : </h1>
                                        <br>
                                        @foreach($modules as $module)
                                            {{$module['basename']}} <br/>
                                        @endforeach

                                        <br><br><br><br><br>
                                    </div>

                                    <h1> Route List </h1>
                                    <div id="routes">
                                        @foreach ($routeCollection as $value)
                                            {{$value->uri()}} <br/>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Main Content Element  End-->
@endsection
@section('css')
    <link rel="stylesheet"
          href="{{ asset($themeAssetsPath . 'js/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset($themeAssetsPath . 'js/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset($themeAssetsPath . 'js/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset($themeAssetsPath . 'js/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset($themeAssetsPath . 'js/codemirror/theme/monokai.css') }}">
@endsection
@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/codemirror/mode/smarty/smarty.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/ckeditor/ckeditor.js') }}"></script>
    <script>
        //CKEDİTOR START
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        };
        CKEDITOR.replace('user_contract', options);
        CKEDITOR.replace('contact', options);
        CKEDITOR.replace('footer_text', options);
        //CKEDİTOR END...

        $(document).ready(function () {
            $('.fileinput').fileinput();
            $('.select2').select2();
            $('.tagsinput').tagsinput();
        });
        function codemirrore1() {
            var a = document.getElementById("facebook_embed_code");
            var b = document.getElementById("twitter_embed_code");
            var c = document.getElementById("instagram_embed_code");
            var j = document.getElementById("pinterest_embed_code");
            CodeMirror.fromTextArea(a, {
                lineNumbers: true,
                matchBrackets: true,
                styleActiveLine: true,
                theme: "monokai",
                readOnly: !1
            });
            CodeMirror.fromTextArea(b, {
                lineNumbers: true,
                matchBrackets: true,
                styleActiveLine: true,
                theme: "monokai",
                readOnly: !1
            });
            CodeMirror.fromTextArea(c, {
                lineNumbers: true,
                matchBrackets: true,
                styleActiveLine: true,
                theme: "monokai",
                readOnly: !1
            });
            CodeMirror.fromTextArea(j, {
                lineNumbers: true,
                matchBrackets: true,
                styleActiveLine: true,
                theme: "monokai",
                readOnly: !1
            });
        }
        function codemirrore2() {
            var d = document.getElementById("weather_code");
            var e = document.getElementById("addthis_code");
            var f = document.getElementById("disqus_code");
            CodeMirror.fromTextArea(d, {
                lineNumbers: true,
                matchBrackets: true,
                styleActiveLine: true,
                theme: "monokai",
                readOnly: !1
            });
            CodeMirror.fromTextArea(e, {
                lineNumbers: true,
                matchBrackets: true,
                styleActiveLine: true,
                theme: "monokai",
                readOnly: !1
            });
            CodeMirror.fromTextArea(f, {
                lineNumbers: true,
                matchBrackets: true,
                styleActiveLine: true,
                theme: "monokai",
                readOnly: !1
            });
        }
        function codemirrore3() {
            var g = document.getElementById("head_code");
            var h = document.getElementById("footer_code");
            CodeMirror.fromTextArea(g, {
                lineNumbers: true,
                matchBrackets: true,
                styleActiveLine: true,
                theme: "monokai",
                readOnly: !1
            });
            CodeMirror.fromTextArea(h, {
                lineNumbers: true,
                matchBrackets: true,
                styleActiveLine: true,
                theme: "monokai",
                readOnly: !1
            });
        }
        var t3 = 0, t5 = 0, t6 = 0;
        $(window).resize(function () {
            $('.select2').select2();
            $('.tagsinput').tagsinput();
        });
        $('.nav-tabs li a').click(function () {
            if ($(this).attr('href') === "#tab_3" && t3 === 0) {
                setTimeout(function () {
                    codemirrore1();
                }, 100);
                t3 = 1;
            }
            if ($(this).attr('href') === "#tab_5" && t5 === 0) {
                setTimeout(function () {
                    codemirrore2();
                }, 100);
                t5 = 1;
            }
            if ($(this).attr('href') === "#tab_6" && t6 === 0) {
                setTimeout(function () {
                    codemirrore3();
                }, 100);
                t6 = 1;
            }
        });
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
        //active menu
        activeMenu('setting', 'general_setting');
    </script>
    <script>
        var latitude = $('#latitude').val();
        var longitude = $('#longitude').val();
        $('#latitude').on('keyup',function () {
            latitude = $(this).val();
        });
        $('#latitude').on('keyup',function () {
            longitude = $(this).val();
        });
        $(function(){
            $(".nav-tabs li a").on("click", function(e){
                if (e.target.hash === '#tab_4') {
                    initMap();
                }
            });
        });


        function initMap() {
            var myLatlng = new google.maps.LatLng(latitude, longitude);
            var myOptions = {
                zoom: 5,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }

            var map = new google.maps.Map(document.getElementById("map"), myOptions);

            addMarker(myLatlng, 'Default Marker', map);

            map.addListener('click', function (event) {

                addMarker(event.latLng, 'Click Generated Marker', map);
            });
            function handleEvent(event) {
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longitude').value = event.latLng.lng();
            }

            function addMarker(latlng, title, map) {
                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    title: title,
                    draggable: true
                });

                marker.addListener('drag', handleEvent);
                marker.addListener('dragend', handleEvent);
            }
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYeFB-plBwrGcrIedpc8xtjrFklJra6PM">
    </script>

    <script type="text/javascript">
        $("select[name='country_id']").change(function(){

            var country_id = $(this).val();
            var token = $("input[name='_token']").val();

            $.ajax({
                url: "{!! route('getCitiesByCountryId') !!}",
                method: 'POST',
                data: {country_id:country_id, _token:token},
                success: function(data) {
                    $("select[name='city_id']").html('');
                    $("select[name='city_id']").html(data.options);
                }
            });
        });
    </script>

@endpush
