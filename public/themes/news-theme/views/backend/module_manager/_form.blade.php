@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('module_manager.management')}}
            <small>{{trans('menu.edit_create')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('module_manager.index') !!}"> {{trans('module_manager.management')}}</a></li>
            <li class="active">{{trans('module_manager.edit_create')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['module_manager.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'module_manager.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('module_manager.edit_create')}}</h3>

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
                            {!! Form::label('name', trans('module_manager.name'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('name', $record->name, ['placeholder' => trans('module_manager.name') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('slug', trans('module_manager.slug'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('slug', $record->slug, ['placeholder' => trans('module_manager.slug') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('order', trans('module_manager.order'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::number('order', $record->order, ['placeholder' => trans('module_manager.order') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <b>{{trans('module_manager.header')}}</b>
                            </div>
                            <div class="col-md-10">
                                <label>
                                    {!! Form::checkbox('is_header', null , $record->is_active) !!}
                                    &nbsp;&nbsp;{{trans('module_manager.is_active')}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <b>{{trans('module_manager.left')}}</b>
                            </div>
                            <div class="col-md-10">
                                <label>
                                    {!! Form::checkbox('is_left', null , $record->is_active) !!}
                                    &nbsp;&nbsp;{{trans('module_manager.is_active')}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <b>{{trans('module_manager.center')}}</b>
                            </div>
                            <div class="col-md-10">
                                <label>
                                    {!! Form::checkbox('is_center', null , $record->is_active) !!}
                                    &nbsp;&nbsp;{{trans('module_manager.is_active')}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <b>{{trans('module_manager.right')}}</b>
                            </div>
                            <div class="col-md-10">
                                <label>
                                    {!! Form::checkbox('is_right', null , $record->is_active) !!}
                                    &nbsp;&nbsp;{{trans('module_manager.is_active')}}
                                </label>
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
                                <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col-md-6 -->
    </div><!-- end row -->
    <!-- Main Content Element  End-->
    {!! Form::close() !!}
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('module_manager','');
    </script>
@endsection