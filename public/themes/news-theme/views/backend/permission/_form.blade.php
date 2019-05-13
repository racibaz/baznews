@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('permission.management')}}
            <small>{{trans('common.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('permission.index') !!}">{{trans('permission.management')}}</a></li>
            <li class="active">{{trans('common.create_edit')}}</li>
        </ol>
    </section>
@endsection
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
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{trans('common.create_edit')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('name', trans('permission.name')) !!}
                        {!! Form::text('name', null, ['class' => 'form-control','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('display_name', trans('permission.display_name')) !!}
                        {!! Form::text('display_name', null, ['class' => 'form-control','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('common.description')) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control','required']) !!}
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                            {!! trans('common.is_active') !!}
                        </label>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Kaydet', ['class' => 'btn btn-success']) !!}
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row-->
    {!! Form::close() !!}
@endsection
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('permission', 'user_management');
    </script>
@endpush