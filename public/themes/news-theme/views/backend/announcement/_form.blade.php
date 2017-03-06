@extends($activeTheme .'::backend.master')

@section('content')

@if(isset($record->id))
    {!! Form::model($record, ['route' => ['announcement.update', $record], 'method' => 'PATCH']) !!}
@else
    {!! Form::open(['route' => 'announcement.store','method' => 'post']) !!}
@endif

<!-- Main content -->
<div class="row">
    <div class="col-md-6">
        <!-- general form elements disabled -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bullhorn"></i>   <strong>Duyuru Ekle / Düzenle</strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {{--<form announcement="form">--}}
                <!-- text input -->
                <div class="form-group">
                    {!! Form::label('title', trans('announcement.title')) !!}
                    {!! Form::text('title', $record->title, ['placeholder' => trans('announcement.title'),'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', trans('announcement.description')) !!}
                    {!! Form::textarea('description', $record->description, ['placeholder' => trans('announcement.description'),'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('order', trans('announcement.order')) !!}
                    {!! Form::number('order', $record->order, ['placeholder' => trans('announcement.order'),'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('show_time', trans('announcement.show_time')) !!}
                    {!! Form::text('show_time', $record->show_time, ['placeholder' => trans('announcement.show_time'),'class' => 'form-control']) !!}
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
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-6">
        <!-- general form elements disabled -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-arrow-circle-o-up"></i> <strong>Duyuru Group Yonetimi</strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {{--<form role="form">--}}
                @foreach($groupList as $index => $group)
                    <div class="form-group">
                        {{++$index}}
                        {!! Form::checkbox('announcement_group_store_[]', $group->id, in_array($group->id , $record->groups->pluck('id')->toArray())) !!} :
                        {{ $group->name }}
                    </div>
                @endforeach
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.content -->

{!! Form::close() !!}

@endsection