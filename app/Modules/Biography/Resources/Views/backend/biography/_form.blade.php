@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('biography::biography.biography')}}
            <small>{{trans('biography::biography.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('biography.index') !!}">{{trans('biography::biography.biography')}}</a></li>
            <li class="active">{{trans('biography::biography.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['biography.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'biography.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <div class="row">
        <div class="col-lg-8" id="content-area">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('biography::biography.create_edit')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>

                    </div>
                </div>
                <div class="box-body">

                    <div class="form-group">
                        {!! Form::label('title', trans('biography::biography.title'),['class'=> 'control-label']) !!}
                        {!! Form::text('title', $record->title, ['placeholder' => trans('biography::biography.title') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', trans('biography::biography.name'),['class'=> 'control-label']) !!}
                        {!! Form::text('name', $record->name, ['placeholder' => trans('biography::biography.name') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', trans('biography::biography.slug'),['class'=> 'control-label']) !!}
                        {!! Form::text('slug', $record->slug, ['placeholder' => trans('biography::biography.slug') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('spot', trans('biography::biography.spot'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('spot', $record->spot, ['placeholder' => trans('biography::biography.spot') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', trans('biography::biography.content'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('content', $record->content, ['placeholder' => trans('biography::biography.content') ,'class' => 'form-control summernote']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('photo', trans('biography::biography.photo'),['class'=> 'control-label','style'=>'width:100%']) !!}

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                <img src="{{ asset('images/biographies/' . $record->id . '/thumbnail/' . $record->photo)}}" alt="{{$record->name}}"/>
                            </div>
                            <div>
                                <span class="btn btn-default btn-file"><span class="fileinput-new">{{trans('biography::biography.select_image')}}</span><span class="fileinput-exists">{{trans('biography::biography.change')}}</span>{!! Form::file('photo') !!}</span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{trans('biography::biography.remove')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('biography::biography.description'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('description', $record->description, ['placeholder' => trans('biography::biography.description') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('keywords', trans('biography::biography.keywords'),['class'=> 'control-label']) !!}
                        {!! Form::text('keywords', $record->keywords, ['placeholder' => trans('biography::biography.keywords') ,'class' => 'form-control tagsinput']) !!}
                    </div>
                    {{--<div class="form-group">--}}
                        {{--{!! Form::label('hit', trans('biography::biography.hit'),['class'=> 'control-label']) !!}--}}
                        {{--{!! Form::number('hit', $record->hit, ['placeholder' => trans('biography::biography.hit') ,'class' => 'form-control']) !!}--}}
                    {{--</div>--}}
                    <!-- /.box-body -->
                </div>
            </div>
        </div><!-- /.col-lg-6 -->
        <div class="col-lg-4" id="sidebar">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('biography::biography.status')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                            {{trans('biography::biography.is_cuff')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                            {{trans('common.is_active')}}
                        </label>
                    </div>
                    <div class="form-group">
                        {!! Form::label('order', trans('biography::biography.order'),['class'=> 'control-label']) !!}
                        {!! Form::number('order', $record->order, ['placeholder' => trans('biography::biography.order') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('status', trans('biography::biography.status'),['class'=> ' control-label']) !!}
                        {!! Form::select('status', $statusList , $record->status , ['placeholder' => trans('biography::biography.please_choose'),'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box-body -->
            </div>
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->


    {!! Form::close() !!}
@endsection

        @section('css')
            <link rel="stylesheet" href="{{ Theme::asset($activeTheme . '::js/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ Theme::asset($activeTheme . '::js/select2/dist/css/select2.min.css') }}">
            <link rel="stylesheet" href="{{ Theme::asset($activeTheme . '::js/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
            <link rel="stylesheet" href="{{ Theme::asset($activeTheme .'::js/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
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
                $(document).ready(function() {
                    $('.select2').select2();
                    $('.tagsinput').tagsinput();
                });
                $(window).resize(function () {
                    $('.select2').select2();
                    $('.tagsinput').tagsinput();
                });
                /*--------------------------------------------------------
                 Sticky Sidebar
                 * --------------------------------------------------------*/
                jQuery(document).ready(function() {
                    jQuery('#sidebar,#content').theiaStickySidebar();
                });
                //active menu
                activeMenu('biograpy_manager','');
            </script>
@endsection