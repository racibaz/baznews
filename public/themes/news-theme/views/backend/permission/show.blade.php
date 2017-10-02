@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('permission.management')}}
            <small>{{$record->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('permission.index') !!}">{{trans('permission.management')}}</a></li>
            <li class="active">{{$record->name}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <!-- Main content -->
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->name}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th width="20%">{{trans('permission.name')}}:</th>
                                <td>{{$record->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('permission.display_name')}}:</th>
                                <td>{!! $record->display_name !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('common.description')}}:</th>
                                <td>{!! $record->description !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('common.is_active')}}:</th>
                                <td>{!! $record->is_active ? '<span class="badge bg-green">'.trans('common.active').'</span>' : '<span class="badge bg-gray">'.trans('common.passive').'</span>'!!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.content -->
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('permission', 'user_management');
    </script>
@endpush