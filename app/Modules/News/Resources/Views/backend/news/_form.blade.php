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
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">
            @include($activeTheme . '::backend.partials._rivisions', ['rivisions' => $record->revisionHistory])
            <div class="panel panel-light-blue">
                <div class="panel-heading">
                    {{--/<h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>--}}
                </div>

                @if(isset($record->id))
                    {!! Form::model($record, ['route' => ['news.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
                @else
                    {!! Form::open(['route' => 'news.store','method' => 'post', 'files' => 'true']) !!}
                @endif

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
                            {!! Form::label('news_resource_id', trans('news::news.news_resource_id'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('news_resource_id', $newsSourceList , $record->news_resource_id , ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control']) !!}
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
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('thumbnail', trans('news::news.thumbnail'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::file('thumbnail') !!}
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
                            {!! Form::label('meta_tags', trans('news::news.meta_tags'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('meta_tags', $record->meta_tags, ['placeholder' => trans('news::news.meta_tags') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('status', trans('news::news.status'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('status', $statuses , $record->status , ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control']) !!}
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
                    {{--<div class="form-group">--}}
                        {{--<div class="row">--}}
                            {{--{!! Form::label('map_text', trans('news::news.map_text'),['class'=> 'col-lg-2 control-label']) !!}--}}

                            {{--<div class="col-lg-10">--}}
                                {{--{!! Form::text('map_text', $record->map_text, ['placeholder' => trans('news::news.map_text') ,'class' => 'form-control']) !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<div class="row">--}}
{{--                            {!! Form::label('map', trans('news::news.map'),['class'=> 'col-lg-2 control-label']) !!}--}}

                            {{--<div class="col-lg-10">--}}
                                {{--<div style="height: 400px; width:100&;"> {!! $googleMapsRender !!} </div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}



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
                {!! Form::close() !!}
            </div>
        </div>


        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('news::news.select_categories') }}</h3>
                </div>

                {!! Form::open(['route' => 'news_news_categories_store','method' => 'post']) !!}

                        <!-- /.box-header -->
                <div class="box-body">
                    {{--<form role="form">--}}

                    {!!  Form::hidden('news_id', $record->id) !!}
                    @foreach($newsCategories as $newsCategory)
                        <div class="form-group">
                            {{ $newsCategory->name }} :
                            {!! Form::checkbox($newsCategory->id, $newsCategory->id, in_array($newsCategory->id , $record->news_categories->pluck('id')->toArray())) !!}
                        </div>
                    @endforeach

                    <div class="box-footer">
                        {!! Form::submit('Kaydet', ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div><!-- end row -->
    <!-- Main Content Element  End-->
</div><!-- end container-fluid -->

@endsection

@section('js')

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
@endsection