@extends($activeTheme . '::backend.master')

@section('content')

    <!-- Main content -->

    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['group.update', $record], 'method' => 'PATCH']) !!}
    @else
        {!! Form::open(['route' => 'group.store','method' => 'post']) !!}
    @endif

    <div class="row">
        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title">{{trans('group.management')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('name', trans('group.name')) !!}
                        {!! Form::text('name', null, ['class' => 'form-control','required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('common.description')) !!}
                        {!! Form::text('description', null, ['class' => 'form-control','required']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                            {!! trans('common.is_active') !!}
                        </label>
                    </div>
                </div>
                <div class="box-footer">
                    {!! Form::submit('Kaydet', ['class' => 'btn btn-success']) !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </div>
    <!-- /.content -->
    {!! Form::close() !!}
@endsection
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('user_management', 'group');
    </script>
@endpush