@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('menu.management')}}
            <small>{{trans('menu.edit_create')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('menu.index') !!}"> {{trans('menu.management')}}</a></li>
            <li class="active">{{trans('menu.edit_create')}}</li>
        </ol>
    </section>
@endsection
@section('content')

@if(isset($record->id))
    {!! Form::model($record, ['route' => ['menu.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
@else
    {!! Form::open(['route' => 'menu.store','method' => 'post', 'files' => 'true']) !!}
@endif
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('menu.edit_create')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: block;">
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('name', trans('menu.name'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('name', $record->name, ['placeholder' => trans('menu.name') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="row">
                            {!! Form::label('parent_id', trans('menu.parent_menu'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('parent_id', $menuList , $record->parent_id , ['placeholder' => trans('menu.please_choose'),'class' => 'form-control select2']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('page_id', trans('menu.site_page'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('page_id', $pageList , $record->page_id , ['placeholder' => trans('menu.please_choose'),'class' => 'form-control select2']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('_lft', trans('menu.sort_left'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::number('_lft', $record->_lft, ['placeholder' => trans('menu.sort_left') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('_rgt', trans('menu.sort_right'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::number('_rgt', $record->_rgt, ['placeholder' => trans('menu.sort_right') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('slug', trans('menu.slug'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('slug', $record->slug, ['placeholder' => trans('menu.slug') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('url', trans('menu.url'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('url', $record->url, ['placeholder' => trans('menu.url') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('route', trans('menu.category'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('route', $linkList , $record->route , ['placeholder' => trans('menu.please_choose'),'class' => 'form-control select2']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('target', trans('menu.target'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('target', [
                                                            '_blank' => '_blank',
                                                            '_self' => '_self',
                                                            '_parent' => '_parent',
                                                            '_top' => '_top',
                                                            ],
                                                            $record->target, ['placeholder' => trans('menu.please_choose'),'class' => 'form-control select2']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('icon', trans('menu.icon'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('icon', $record->icon, ['placeholder' => trans('menu.icon') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('order', trans('menu.order'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::number('order', $record->order, ['placeholder' => trans('menu.order') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                <b>{{trans('menu.header_menu')}}</b>
                            </div>
                            <div class="col-lg-10">
                                <label>
                                    {!! Form::checkbox('is_header', null , $record->is_header) !!}
                                    <i></i> {{trans('menu.is_header')}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                <b>{{trans('menu.footer_menu')}}</b>
                            </div>
                            <div class="col-lg-10">
                                <label>
                                    {!! Form::checkbox('is_footer', null , $record->is_footer) !!}
                                    <i></i> {{trans('menu.is_footer')}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                <b>{{trans('menu.status')}}</b>
                            </div>
                            <div class="col-lg-10">
                                <label>
                                    {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                    <i></i> {{trans('menu.is_active')}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('menu.save')}}</button>
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
    <link rel="stylesheet" href="{{ Theme::asset($activeTheme . '::js/select2/dist/css/select2.min.css') }}">
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/select2/dist/js/select2.min.js') }}"></script>
    <script>
        //active menu
        activeMenu('menu_management','');
        //select2
        $('.select2').select2();
    </script>
@endsection