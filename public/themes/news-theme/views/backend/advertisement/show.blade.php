@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('advertisement.management')}}
            <small>{{$record->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('advertisement.index') !!}"> {{trans('advertisement.management')}}</a></li>
            <li class="active">{{$record->name}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
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
                <div class="box-body" style="display: block;">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>{{trans('advertisement.name')}}</th>
                            <td>{{$record->name}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('advertisement.code')}}</th>
                            <td>{!! $record->code !!}</td>
                        </tr>
                        <tr>
                            <th>{{trans('common.description')}}</th>
                            <td>{{$record->description}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('common.status')}}</th>
                            <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('advertisement', '');
    </script>
@endpush

