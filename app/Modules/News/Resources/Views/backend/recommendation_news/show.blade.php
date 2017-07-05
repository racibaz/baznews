@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::recommendation_news.management')}}
            <small>{{$record->news->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('recommendation_news.index') !!}">{{trans('news::recommendation_news.management')}}</a></li>
            <li class="active">{{$record->user_id}}</li>
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
                                <th width="20%">{{trans('news::recommendation_news.news_id')}}:</th>
                                <td>{!! link_to_route('news_show', $record->news->title , $record, [] ) !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::recommendation_news.user_id')}}:</th>
                                <td>{!! link_to_route('user.show', $record->user->name, $record, [] ) !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::recommendation_news.order')}}:</th>
                                <td>{{$record->order}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::recommendation_news.is_cuff')}}:</th>
                                <td>{!!$record->is_cuff ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::recommendation_news.is_active')}}:</th>
                                <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
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

