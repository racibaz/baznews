@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('announcement.management')}}
            <small>{{trans('announcement.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('announcement.index') !!}"> {{trans('announcement.management')}}</a></li>
            <li>{{trans('announcement.create_edit')}}</li>
        </ol>
    </section>
@endsection
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
                <h3 class="box-title"><i class="fa fa-bullhorn"></i> {{trans('announcement.create_edit')}}</h3>
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
                    {!! Form::text('show_time', $record->show_time, ['placeholder' => trans('announcement.show_time'),'class' => 'form-control','id'=>'show_time']) !!}
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
                <h3 class="box-title"><i class="fa fa-users"></i> {{trans('announcement.view_group')}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {{--<form role="form">--}}
                @foreach($groupList as $index => $group)
                    <div class="form-group">
                        <label for="{{$group->id}}">
                            {!! Form::checkbox('announcement_group_store_[]', $group->id, in_array($group->id , $record->groups->pluck('id')->toArray())) !!}
                            {{++$index}} - {{ $group->name }}
                        </label>
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
@section('css')
    <link href="{{ Theme::asset($activeTheme .'::js/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
@endsection
@section('js')

    <script src="{{ Theme::asset($activeTheme .'::js/moment/min/moment.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme .'::js/moment/locale/tr.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme .'::js/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme .'::js/ckeditor/ckeditor.js') }}"></script>
    <script>
        //CKEDİTOR START
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        };
        CKEDITOR.replace('description', options);
        //CKEDİTOR END...
        //active menu
        activeMenu('announcement','');
        $(function () {
            //Date range picker with time picker
            $('#show_time').datetimepicker({
                format:'YYYY-MM-DD HH:mm:ss',
                locale:'tr'
            });
        });
    </script>
@endsection

