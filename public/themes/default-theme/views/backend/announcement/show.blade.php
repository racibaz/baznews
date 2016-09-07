@extends('default-theme::backend.master')

@section('content')

<!-- Main content -->
<div class="row">
    <div class="col-md-6">
        <!-- general form elements disabled -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title"><strong>{{$record->title}}</strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {{--<form announcement="form">--}}

                <div class="form-group">
                    {!! Form::label('name', trans('announcement.title')) !!}
                    : {{$record->title}}
                </div>
                <div class="form-group">
                    {!! Form::label('order', trans('announcement.order')) !!}
                    : {{$record->order}}
                </div>
                <div class="form-group">
                    {!! Form::label('description', trans('announcement.description')) !!}
                    :
                    {!! $record->description !!}
                </div>
                <div class="form-group">
                    {!! Form::label('show_time', trans('announcement.show_time')) !!}
                    : {{$record->show_time}}
                </div>
                <div class="form-group">
                    {!! Form::label('is_active', trans('common.is_active')) !!}
                    : {{$record->is_active}}
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.content -->
</div>

@endsection

