@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('rss.management')}}
            <small>{{$record->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('announcement.index') !!}"> {{trans('rss.management')}}</a></li>
            <li>{{$record->name}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
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
                <div class="box-body" style="padding: 0;">
                    <table class="table table-bordered table-hover" style="margin: 0;">
                        <tbody>
                        <tr>
                            <th width="20%">{{trans('rss.name')}}</th>
                            <td>{{$record->name}}:</td>
                        </tr>
                        <tr>
                            <th>{{trans('rss.url')}}:</th>
                            <td>{{$record->url}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('common.order')}}:</th>
                            <td>{{$record->order}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('common.is_active')}}:</th>
                            <td>{!! $record->is_active ? '<span class="badge bg-green">'.trans('common.active').'</span>' : '<span class="badge bg-gray">'.trans('common.passive').'</span>' !!}</td>
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
        activeMenu('rss', '');
    </script>
@endpush
