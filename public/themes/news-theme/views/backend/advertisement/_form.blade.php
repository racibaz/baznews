@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('advertisement.management')}}
            <small>{{trans('advertisement.add_advert')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('advertisement.index') !!}"> {{trans('advertisement.management')}}</a></li>
            <li class="active">{{trans('advertisement.add_advert')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['advertisement.update', $record], 'method' => 'PATCH']) !!}
    @else
        {!! Form::open(['route' => 'advertisement.store','method' => 'post']) !!}
    @endif

    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('advertisement.management')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('name', trans('advertisement.name'),['class'=> 'col-lg-2 control-label ']) !!}
                            <div class="col-lg-10">
                                {!! Form::select('name',$advertisementList,$record->name,['placeholder' => trans('advertisement.name'),'class' => 'form-control select2',]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('code', trans('advertisement.code'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('code', $record->code, ['placeholder' => trans('advertisement.code') ,'class' => 'form-control','id'=>'advert_code']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('description', trans('advertisement.description'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('description', $record->description, ['placeholder' => trans('advertisement.description') ,'class' => 'form-control','rows'=>'3']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <b>{{trans('common.status')}}</b>
                            </div>
                            <div class="col-md-10">
                                <label>
                                    {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                    &nbsp;&nbsp;{{trans('common.is_active')}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-success" type="submit"><i
                                            class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                            </div>
                        </div>
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
    <link rel="stylesheet" href="{{ Theme::asset($activeTheme . '::js/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ Theme::asset($activeTheme . '::js/codemirror/theme/monokai.css') }}">
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/codemirror/mode/smarty/smarty.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/codemirror/mode/css/css.js') }}"></script>
    <script type="text/javascript">
        function codemirrore1() {
            var a = document.getElementById("advert_code");
            CodeMirror.fromTextArea(a, {
                lineNumbers: true,
                matchBrackets: true,
                styleActiveLine: true,
                theme: "monokai",
                readOnly: !1
            });
        }
        jQuery(window).load(function () {
            codemirrore1();
        });
        //active menu
        activeMenu('advertisement', '');
    </script>
@endsection