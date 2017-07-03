@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::photo_gallery.management')}}
            <small>{{$record->user_id}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('photo_gallery.index') !!}">{{trans('news::photo_gallery.management')}}</a></li>
            <li class="active">{{$record->user_id}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->news_id}}</h3>

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
                                <th width="20%">{{trans('news::recommendation_news.news_id')}}:</th>
                                <td>{{$record->news_id}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::recommendation_news.user_id')}}:</th>
                                <td>{{$record->user_id}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::recommendation_news.order')}}:</th>
                                <td>{{$record->order}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::recommendation_news.is_cuff')}}:</th>
                                <td>{{$record->is_cuff}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::recommendation_news.is_active')}}:</th>
                                <td>{{$record->is_active}}</td>
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

