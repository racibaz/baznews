@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::video.management')}}
            <small>{{$record->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('video.index') !!}">{{trans('news::video.management')}}</a></li>
            <li class="active">{{$record->name}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->name}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th width="20%">{{trans('news::video.id')}}</th>
                                <td>{{$record->id}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video.photo_gallery_id')}}</th>
                                <td>{{$record->photo_gallery_id}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video.name')}}</th>
                                <td>{{$record->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video.slug')}}</th>
                                <td>{{$record->slug}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video.subtitle')}}</th>
                                <td>{{$record->subtitle}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video.file')}}</th>
                                <td>{{$record->file}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video.link')}}</th>
                                <td>{{$record->link}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video.content')}}</th>
                                <td>{{$record->content}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video.keywords')}}</th>
                                <td>{{$record->keywords}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video.order')}}</th>
                                <td>{{$record->order}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::video.is_active')}}</th>
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

@section('js')
    <script>
        $(function () {

            //active menu
            activeMenu('video','news_management');
        });
    </script>
@endsection