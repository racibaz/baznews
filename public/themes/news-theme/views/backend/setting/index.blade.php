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
        <div class="col-md-5" id="content">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{trans('setting.general')}}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('country', trans('setting.country'),['class'=> 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::select('country', $countryList , $records->where('attribute_key','country')->first()->attribute_value , ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('city', trans('setting.city'),['class'=> 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::select('city', $cityList , $records->where('attribute_key','city')->first()->attribute_value , ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('language_code', trans('setting.language_code'),['class'=> 'col-lg-2 control-label']) !!}
                                <div class="col-lg-10">
                                    {!! Form::select('language_code', $languageList , $records->where('attribute_key','language_code')->first()->attribute_value , ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('title', trans('setting.title'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('title', $records->where('attribute_key','title')->first()->attribute_value, ['placeholder' => trans('setting.title') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('slogan', trans('setting.slogan'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('slogan', $records->where('attribute_key','slogan')->first()->attribute_value, ['placeholder' => trans('setting.slogan') ,'class' => 'form-control']) !!}
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
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('description', trans('setting.description'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('description', $records->where('attribute_key','description')->first()->attribute_value, ['placeholder' => trans('setting.description') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('keywords', trans('setting.keywords'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('keywords', $records->where('attribute_key','keywords')->first()->attribute_value, ['placeholder' => trans('setting.keywords') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('timezone', trans('setting.timezone'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::select('timezone', $timezoneList , $records->where('attribute_key','timezone')->first()->attribute_value , ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('logo', trans('setting.logo'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    <img src="{!! asset($logo->attribute_value) !!}">
                                    <br />
                                    {!! Form::file('logo') !!}
                                    <img id="preview" src="#" alt="">
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('abstract_text', trans('setting.abstract_text'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('abstract_text', $records->where('attribute_key','abstract_text')->first()->attribute_value, ['placeholder' => trans('setting.abstract_text') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('footer_text', trans('setting.footer_text'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('footer_text', $records->where('attribute_key','footer_text')->first()->attribute_value, ['placeholder' => trans('setting.footer_text') ,'class' => 'form-control summernote']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('contact', trans('setting.contact'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('contact', $records->where('attribute_key','contact')->first()->attribute_value, ['placeholder' => trans('setting.contact') ,'class' => 'form-control summernote']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('copyright', trans('setting.copyright'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('copyright', $records->where('attribute_key','copyright')->first()->attribute_value, ['placeholder' => trans('setting.copyright') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('url', trans('setting.url'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('url', $records->where('attribute_key','url')->first()->attribute_value, ['placeholder' => trans('setting.url') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('google_recaptcha_site_key', trans('setting.google_recaptcha_site_key'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('google_recaptcha_site_key', $records->where('attribute_key','google_recaptcha_site_key')->first()->attribute_value, ['placeholder' => trans('setting.google_recaptcha_site_key') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('google_recaptcha_secret_key', trans('setting.google_recaptcha_secret_key'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('google_recaptcha_secret_key', $records->where('attribute_key','google_recaptcha_secret_key')->first()->attribute_value, ['placeholder' => trans('setting.google_recaptcha_secret_key') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('google_url_shortener_key', trans('setting.google_url_shortener_key'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('google_url_shortener_key', $records->where('attribute_key','google_url_shortener_key')->first()->attribute_value, ['placeholder' => trans('setting.google_url_shortener_key') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('head_code', trans('setting.head_code'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('head_code', $records->where('attribute_key','head_code')->first()->attribute_value, ['placeholder' => trans('setting.head_code') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('footer_code', trans('setting.footer_code'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('footer_code', $records->where('attribute_key','footer_code')->first()->attribute_value, ['placeholder' => trans('setting.footer_code') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('weather_embed_code', trans('setting.weather_embed_code'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('weather_embed_code', $records->where('attribute_key','weather_embed_code')->first()->attribute_value, ['placeholder' => trans('setting.weather_embed_code') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('addthis', trans('setting.addthis'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('addthis', $records->where('attribute_key','addthis')->first()->attribute_value, ['placeholder' => trans('setting.addthis') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('disqus', trans('setting.disqus'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('disqus', $records->where('attribute_key','disqus')->first()->attribute_value, ['placeholder' => trans('setting.disqus') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('rss_count', trans('setting.rss_count'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('rss_count', $records->where('attribute_key','rss_count')->first()->attribute_value, ['placeholder' => trans('setting.rss_count') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('rss_cache_life_time', trans('setting.rss_cache_life_time'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('rss_cache_life_time', $records->where('attribute_key','rss_cache_life_time')->first()->attribute_value, ['placeholder' => trans('setting.rss_cache_life_time') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('rss_cache_life_time', trans('setting.rss_cache_life_time'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('rss_cache_life_time', $records->where('attribute_key','rss_cache_life_time')->first()->attribute_value, ['placeholder' => trans('setting.rss_cache_life_time') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('sitemap_count', trans('setting.sitemap_count'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('sitemap_count', $records->where('attribute_key','sitemap_count')->first()->attribute_value, ['placeholder' => trans('setting.sitemap_count') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('allow_photo_formats', trans('setting.allow_photo_formats'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('allow_photo_formats', $records->where('attribute_key','allow_photo_formats')->first()->attribute_value, ['placeholder' => trans('setting.allow_photo_formats') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('allow_video_formats', trans('setting.allow_video_formats'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('allow_video_formats', $records->where('attribute_key','allow_video_formats')->first()->attribute_value, ['placeholder' => trans('setting.allow_video_formats') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('latitude', trans('setting.latitude'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('latitude', $records->where('attribute_key','latitude')->first()->attribute_value, ['placeholder' => trans('setting.latitude') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('longitude', trans('setting.longitude'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('longitude', $records->where('attribute_key','longitude')->first()->attribute_value, ['placeholder' => trans('setting.longitude') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- /.box-body -->
                </div>
        </div><!-- /.col-md-6 -->
        <div class="col-md-4" id="content2">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('setting.social_connect')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
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
                <!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col-md-6 -->
        <div class="col-md-3" id="sidebar">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('setting.status')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {{--<div class="form-group">--}}
                    {{--<div class="row">--}}
                    {{--{!! Form::label('attribute_value', trans('setting.attribute_value'),['class'=> 'col-lg-2 control-label']) !!}--}}

                    {{--<div class="col-lg-10">--}}
                    {{--{!! Form::textarea('attribute_value', $record->attribute_value, ['placeholder' => trans('setting.attribute_value') ,'class' => 'form-control']) !!}--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                    {{--<div class="row">--}}
                    {{--{!! Form::label('description', trans('setting.description'),['class'=> 'col-lg-2 control-label']) !!}--}}

                    {{--<div class="col-lg-10">--}}
                    {{--{!! Form::textarea('description', $record->description, ['placeholder' => trans('setting.description') ,'class' => 'form-control']) !!}--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                    {{--<div class="row">--}}
                    {{--{{trans('common.status')}}--}}
                    {{--<div class="col-lg-offset-2 col-lg-10">--}}
                    {{--<div class="checkbox i-checks">--}}
                    {{--<label>--}}
                    {{--{!! Form::checkbox('is_active', null , $record->is_active) !!}--}}
                    {{--<i></i> {{trans('common.is_active')}}--}}
                    {{--</label>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-success pull-right" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-footer -->

                <!-- /.box-body -->
            </div>
        </div>
    </div><!-- end row -->
    {!! Form::close() !!}


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
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('setting.attribute_key')}}</th>
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

                    <div>

                        <br /><br /><br />
                        <ul>
                            <li><a href="{!! route('repairMysqlTables') !!}"> <span>Mysql Tabloları Onar</span></a></li>
                            <li><a href="{!! route('getAllRedisKey') !!}"> <span>Cache Verileri Göster</span></a></li>
                            <li><a href="{!! route('flushAllCache') !!}"> <span>Cache Verilerini Sil</span></a></li>
                            <li><a href="{!! route('getBackUp') !!}"> <span>Backup Al</span></a></li>
                            <li><a href="{!! route('backUpClean') !!}"> <span>Backup ları Sil</span></a></li>
                            <li><a href="{!! route('viewClear') !!}"> <span>View Cache lerini Temizle</span></a></li>
                            <li><a href="{!! route('routeClear') !!}"> <span>Route Cache lerini Temizle</span></a></li>
                            <li><a href="{!! route('configClear') !!}"> <span>Konfigirasyon Ayarlarını lerini Temizle</span></a></li>
                            <li><a href="{!! route('configCache') !!}"> <span>Konfigirasyon Ayarlarını lerini Cache le</span></a></li>
                        </ul>
                        <br /><br />
                    </div>

                    <div>
                        <h1>activeTheme :</h1> {{$activeTheme}} <br>
                        <h1> themes : </h1>
                        @foreach($themes as $theme)
                            {{$theme}} <br />
                        @endforeach
                        <br><br><br><br><br>

                        <h1> modulesCount : </h1> {{$modulesCount}}
                        <br>
                        <h1> modules : </h1>
                        <br>
                        @foreach($modules as $module)
                            {{$module['basename']}} <br />
                        @endforeach

                        <br><br><br><br><br>
                    </div>

                    <h1> Route List </h1>
                    <div id="routes">
                        @foreach ($routeCollection as $value)
                            {{$value->uri()}} <br />
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
    <!-- Main Content Element  End-->
@endsection

@section('css')
    <style>
        #preview {display: none;}
        .display {display: block !important;}
    </style>
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                $( "#preview" ).addClass( "display" );
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#logo").change(function(){
            readURL(this);
        });
        $(document).ready(function() {
            $('.summernote').summernote();
        });
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function() {
            jQuery('#sidebar,#content,#content2').theiaStickySidebar();
        });

    </script>
@endsection
