@extends($activeTheme. '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('announcement.management')}}
            <small>{{$record->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('announcement.index') !!}"> {{trans('announcement.management')}}</a></li>
            <li class="active">{{$record->title}}</li>
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
                    <h3 class="box-title">{{$record->title}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="padding: 0;">
                    <table class="table table-bordered table-hover" style="margin: 0;">
                        <tbody>
                        <tr>
                            <th width="20%">{{trans('announcement.title')}}:</th>
                            <td>{{$record->title}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('announcement.order')}}:</th>
                            <td>{{$record->order}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('announcement.description')}}:</th>
                            <td>{!! $record->description !!}</td>
                        </tr>
                        <tr>
                            <th>{{trans('announcement.show_time')}}:</th>
                            <td>{{$record->show_time}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('common.is_active')}}:</th>
                            <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                        </tr>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.content -->
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('announcement', '');
    </script>
@endsection