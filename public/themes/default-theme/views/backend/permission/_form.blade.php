@extends($activeTheme . '::backend.master')

@section('content')

    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['permission.update', $record], 'method' => 'PATCH']) !!}
    @else
        {!! Form::open(['route' => 'permission.store','method' => 'post']) !!}
    @endif

    <!-- Main content -->
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>İzin Ekle / Düzenle</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                {{--<form permission="form">--}}

                <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('name', trans('permission.name')) !!}
                        {!! Form::text('name', null, ['class' => 'form-control','required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('display_name', trans('permission.display_name')) !!}
                        {!! Form::text('display_name', null, ['class' => 'form-control','required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('permission.description')) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control','required']) !!}
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