@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('article::article.management')}}
            <small>{{trans('article::article.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('article.index') !!}">{{trans('article::article.management')}}</a></li>
            <li class="active">{{trans('article::article.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['article.update', $record], 'method' => 'PATCH']) !!}
    @else
        {!! Form::open(['route' => 'article.store','method' => 'post']) !!}
    @endif

    {!! Form::hidden('user_id', Auth::user()->id ) !!}

    <div class="modal fade" id="revision-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{trans('article::article.revision_line')}}</h4>
                </div>
                <div class="modal-body">
                    @include($activeTheme . '::backend.partials._rivisions', ['rivisions' => $record->revisionHistory])
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{trans('article::article.close')}}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="row">
        <div class="col-lg-8" id="content-area">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('article::article.create_edit')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>

                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('article_author_id', trans('article::article.author_name'),['class'=> 'control-label']) !!}
                        {!! Form::select('article_author_id', $articleAuthorList , $record->article_author_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control select2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('title', trans('article::article.title'),['class'=> 'control-label']) !!}
                        {!! Form::text('title', $record->title, ['placeholder' => trans('article::article.title') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('subtitle', trans('article::article.subtitle'),['class'=> 'control-label']) !!}
                        {!! Form::text('subtitle', $record->subtitle, ['placeholder' => trans('article::article.subtitle') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('slug', trans('article::article.slug'),['class'=> 'control-label']) !!}
                                {!! Form::text('slug', $record->slug, ['placeholder' => trans('article::article.slug') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('short_url', trans('article::article.short_url'),['class'=> 'control-label']) !!}
                                {!! Form::text('short_url', $record->short_url, ['placeholder' => trans('article::article.short_url') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div></div>
                    <div class="form-group">
                        {!! Form::label('spot', trans('article::article.spot'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('spot', $record->spot, ['placeholder' => trans('article::article.spot') ,'class' => 'form-control','rows'=>'3']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', trans('article::article.content'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('content', $record->content, ['placeholder' => trans('article::article.content') ,'class' => 'form-control content summernote']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('article::article.description'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('description', $record->description, ['placeholder' => trans('article::article.description') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('keywords', trans('article::article.keywords'),['class'=> 'control-label','style'=>'width:100%']) !!}
                        {!! Form::text('keywords', $record->keywords, ['placeholder' => trans('article::article.keywords') ,'class' => 'form-control tagsinput']) !!}
                    </div>


                </div>
                <!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col-lg-6 -->
        <div class="col-lg-4" id="sidebar">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('article::article.article_categories') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('article_category_ids[]', trans('article::article.article_categories'),['class'=> 'control-label']) !!}
                        {!! Form::select('article_category_ids[]', $articleCategoryList , $articleCategoryIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('article::article.status') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('order', trans('article::article.order'),['class'=> 'control-label']) !!}
                        {!! Form::number('order', $record->order, ['placeholder' => trans('article::article.order') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('status', trans('article::article.status'),['class'=> 'control-label']) !!}
                        {!! Form::select('status', $statusList , $record->status , ['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                            {{trans('article::article.is_cuff')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-success" type="submit"><i
                                            class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                                <a class="btn btn-primary" data-toggle="modal" href="#revision-id"><i
                                            class="fa fa-calendar"></i> {{trans('article::article.revision_line')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div><!-- /.row -->
    {!! Form::close() !!}
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
            $('.select2').select2();
            $('.tagsinput').tagsinput();

            /*--------------START INFINITE -------------------*/
            var win = $(window);
            // Each time the user scrolls
            win.scroll(function() {
                // End of the document reached?
                if ($(document).height() - win.height() === win.scrollTop()) {
                    $('#loading').show();

                    $.ajax({
                        url: '',//TODO : Back end services url gelecek..
                        dataType: 'html',
                        success: function(html) {
                            $('#activity-modal').find('.modal-body').append(html);
                            $('#loading').hide();
                        }
                    });
                }
            });
            /*--------------END INFINITE -------------------*/
            
        });
        $(window).resize(function () {
            $('.select2').select2();
            $('.tagsinput').tagsinput();
        });
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
        //active menu
        activeMenu('articles', 'article_management');
    </script>
@endsection
