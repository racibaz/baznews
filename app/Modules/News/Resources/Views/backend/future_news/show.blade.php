@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::future_news.management')}}
            <small>{{$record->news->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('future_news.index') !!}">{{trans('news::future_news.management')}}</a></li>
            <li class="active">{{$record->news->title}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->news->title}}</h3>

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
                        <table class="table table-bordered table-hover">
                            <tbody>
                            <tr>
                                <th width="20%">{{trans('news::future_news.news_title')}}:</th>
                                <td>{{$record->news->title}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::future_news.future_datetime')}}:</th>
                                <td>{{$record->future_datetime}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('common.status')}}:</th>
                                <td>{!! $record->news->status ? '<span class="badge bg-green">'.trans('news::future_news.news_live').'</span>':'<span class="badge bg-brown">'.trans('news::future_news.news_not_live').'</span>' !!} </td>
                            </tr>
                            <tr>
                                <th>{{trans('common.is_active')}}:</th>
                                <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('news::future_news.active') . '</label>' : '<label class="badge bg-brown">' . trans('news::future_news.passive') . '</label>'!!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        activeMenu('news_management', 'future_news');
    </script>
@endpush

