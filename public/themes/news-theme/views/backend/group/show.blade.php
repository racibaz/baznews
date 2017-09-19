@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('group.management')}}
            <small>{{trans('group.show')}}</small>
        </h1>

        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('group.index') !!}"> {{ trans('group.management') }} </a></li>
            <li class="active">{{$record->name}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <!-- Main content -->
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->name}}</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="margin-bottom: 0;">
                            <tbody>
                            <tr>
                                <td><b>{!! Form::label('name', trans('group.name')) !!}:</b></td>
                                <td>{{$record->name}}</td>
                            </tr>
                            <tr>
                                <td><b>{!! Form::label('description', trans('group.description')) !!}:</b></td>
                                <td>{{$record->description}}</td>
                            </tr>
                            <tr>
                                <td><b>{!! Form::label('is_active', trans('common.is_active')) !!}</b></td>
                                <td>
                                    @if($record->is_active)
                                        <span class="badge bg-green">{{trans('common.active')}}</span>
                                    @else
                                        <span class="badge bg-red">{{trans('common.passive')}}</span>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table><!-- /.table -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.content -->

        @endsection

        @section('js')
            <script type="text/javascript">
                //active menu
                activeMenu('user_management', 'group');
            </script>
@endsection