@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('page.management')}}
            <small>{{$record->name}}    </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('page.index') !!}"> {{trans('page.management')}}</a></li>
            <li class="active">{{$record->name}}</li>
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
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="margin: 0;">
                            <tbody>
                            <tr>
                                <th width="20%">{{trans('page.name')}}:</th>
                                <td>{{$record->name}}</td>
                            </tr>

                            <tr>
                                <th>{{trans('page.slug')}}:</th>
                                <td>{{$record->slug}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('page.content')}}:</th>
                                <td>{!! $record->content !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('page.keywords')}}:</th>
                                <td>{{$record->keywords}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('page.description')}}:</th>
                                <td>{{$record->description}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col-md-6 -->
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('page', '');
    </script>
@endpush
