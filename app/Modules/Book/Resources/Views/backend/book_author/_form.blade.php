@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('book::book_author.management')}}
            <small>{{trans('book::book_author.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('book_author.index') !!}">{{trans('book::book_author.management')}}</a></li>
            <li class="active">{{trans('book::book_author.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['book_author.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'book_author.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <div class="row">
        <div class="col-lg-8" id="content">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('book::book_author.create_edit')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>

                    </div>
                </div>
                <div class="box-body">

                    <div class="form-group">
                        {!! Form::label('name', trans('book::book_author.name'),['class'=> 'control-label']) !!}
                        {!! Form::text('name', $record->name, ['placeholder' => trans('book::book_author.name') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', trans('book::book_author.slug'),['class'=> 'control-label']) !!}
                        {!! Form::text('slug', $record->name, ['placeholder' => trans('book::book_author.slug') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('link', trans('book::book_author.link'),['class'=> 'control-label']) !!}
                        {!! Form::text('link', $record->link, ['placeholder' => trans('book::book_author.link') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('bio_note', trans('book::book_author.bio_note'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('bio_note', $record->bio_note, ['placeholder' => trans('book::book_author.bio_note') ,'class' => 'form-control summernote']) !!}
                    </div>

                </div>
                <!-- /.box-body -->
            </div><!-- /.box-solid -->
        </div><!-- /.col-lg-6 -->
        <div class="col-lg-4" id="sidebar">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('book::book_author.status')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                            {{trans('book::common.is_cuff')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                            {{trans('book::common.is_active')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}
                        </button>
                    </div>
                </div>
                <!-- /.box-body -->
            </div><!-- /.box-solid -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('book::book_author.thumbnail')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('thumbnail', trans('book::book_author.thumbnail'),['class'=> 'control-label','style'=>'width:100%']) !!}
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                            <div>
                                <span class="btn btn-default btn-file"><span class="fileinput-new">{{trans('book::common.select_image')}}</span><span class="fileinput-exists">{{trans('book::common.change')}}</span>{!! Form::file('thumbnail') !!}</span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{trans('book::common.remove')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div><!-- /.box-solid -->
        </div>
    </div><!-- /.row -->
    {!! Form::close() !!}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ Theme::asset($activeTheme . '::js/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ Theme::asset($activeTheme . '::js/select2/dist/css/select2.min.css') }}">
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
            $('.summernote').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                  // set focus to editable area after initializing summernote
            });
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
        activeMenu('book_authors','book_management');
    </script>
@endsection
