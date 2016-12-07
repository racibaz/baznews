@extends($activeTheme . '::backend.master')

@section('content')

    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['group.update', $record], 'method' => 'PATCH']) !!}
    @else
        {!! Form::open(['route' => 'group.store','method' => 'post']) !!}
    @endif


    <!-- Main content -->

    <div class="row">

        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="ls-top-header">{{trans('group.managment')}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                {{--<form group="form">--}}

                <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('name', trans('group.name')) !!}
                        {!! Form::text('name', null, ['class' => 'form-control','required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('group.description')) !!}
                        {!! Form::text('description', null, ['class' => 'form-control','required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                            {!! trans('common.is_active') !!}
                        </label>
                    </div>
                    <div class="box-footer">
                        {!! Form::submit('Kaydet', ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </div>
    <!-- /.content -->

@endsection