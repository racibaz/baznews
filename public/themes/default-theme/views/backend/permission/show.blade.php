@extends('default-theme::backend.master')

@section('content')

<!-- Main content -->
<div class="row">
   <div class="col-md-6">
    <!-- general form elements disabled -->
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">{{$record->name}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {{--<form permission="form">--}}

            <div class="form-group">
                {!! Form::label('name', trans('permission.name')) !!}
                : {{$record->name}}
            </div>
            <div class="form-group">
                {!! Form::label('display_name', trans('permission.display_name')) !!}
                : {{$record->display_name}}
            </div>
            <div class="form-group">
                {!! Form::label('description', trans('permission.description')) !!}
                : {{$record->description}}
            </div>
            <div class="form-group">
                {!! Form::label('is_active', trans('permission.is_active')) !!}
                : {{$record->is_active}}
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.content -->

@endsection

