@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('widget_group.management')}}
            <small>{{trans('common.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('widget_group.index') !!}"> {{trans('widget_group.management')}}</a></li>
            <li class="active">{{trans('common.create_edit')}}</li>
        </ol>
    </section>
@endsection

@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['widget_group.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'widget_group.store','method' => 'post', 'files' => 'true']) !!}
    @endif

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{$record->name}}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('name', trans('widget_group.name'),['class'=> 'control-label']) !!}
                {!! Form::hidden('name',$record->name) !!}
                {!! Form::text('name', $record->name, ['placeholder' => trans('widget_group.name') ,'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>
                    {!! Form::checkbox('is_active', null , $record->is_active) !!}
                    {{trans('common.is_active')}}
                </label>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    {!! Form::close() !!}
@endsection
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('group', 'widget_management');
    </script>
@endpush