@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::video_gallery.management')}}
            <small>{{$record->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('video_gallery.index') !!}">{{trans('news::video_gallery.management')}}</a></li>
            <li class="active">{{$record->title}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->title}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
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
                                <th>{{trans('news::video_gallery.video_category_id')}}</th>
                                <td>{{$record->video_category_id}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video_gallery.title')}}</th>
                                <td>{{$record->title}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video_gallery.slug')}}</th>
                                <td>{{$record->slug}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video_gallery.short_url')}}</th>
                                <td>{{$record->short_url}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video_gallery.description')}}</th>
                                <td>{{$record->description}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video_gallery.keywords')}}</th>
                                <td>{{$record->keywords}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video_gallery.thumbnail')}}</th>
                                <td>{{$record->thumbnail}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video_gallery.is_cuff')}}</th>
                                <td>{!!$record->is_cuff ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video_gallery.is_active')}}</th>
                                <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video_gallery.created_at')}}</th>
                                <td>{{$record->created_at}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video_gallery.updated_at')}}</th>
                                <td>{{$record->updated_at}}</td>
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

