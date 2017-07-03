@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('module_manager.management')}}
            <small>{{trans('module_manager.edit_create')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('module_manager.index') !!}"> {{trans('module_manager.management')}}</a></li>
            <li class="active">{{trans('module_manager.edit_create')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->name}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>

                @if(isset($record->id))
                    {!! Form::model($record, ['route' => ['widget_manager.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
                @else
                    {!! Form::open(['route' => 'widget_manager.store','method' => 'post', 'files' => 'true']) !!}
                @endif

                <div class="box-body">

                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('name', trans('widget_manager.name'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::hidden('name',$record->name) !!}
                                {!! Form::text('name', $record->name, ['placeholder' => trans('widget_manager.name') ,'class' => 'form-control','disabled' => 'disabled']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('slug', trans('widget_manager.slug'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::hidden('slug',$record->slug) !!}
                                {!! Form::text('slug', $record->slug, ['placeholder' => trans('widget_manager.slug') ,'class' => 'form-control','disabled' => 'disabled']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('namespace', trans('widget_manager.namespace'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::hidden('namespace',$record->namespace) !!}
                                {!! Form::text('namespace', $record->namespace, ['placeholder' => trans('widget_manager.namespace') ,'class' => 'form-control','disabled' => 'disabled']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('position', trans('widget_manager.position'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::number('position', $record->position, ['placeholder' => trans('widget_manager.position') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('group', "Group",['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('group', $widgetGroupList, $record->group, ['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                <b>{{trans('common.status')}}</b>
                            </div>
                            <div class="col-lg-10">
                                <label>
                                    {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                    {{trans('common.is_active')}}
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
                {!! Form::close() !!}
            </div>
        </div>
    </div><!-- end row -->
    <!-- Main Content Element  End-->
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('widget', 'widget_management');
    </script>
@endsection