@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('biography::biography.management')}}
            <small>{{$record->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('biography.index') !!}">{{trans('biography::biography.management')}}</a></li>
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
                            {{--<tr>--}}
                            {{--<th>{{trans('biography::biography.id')}}</th>--}}
                            {{--<td>{{$record->id}}</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                            {{--<th>{{trans('biography::biography.user_id')}}</th>--}}
                            {{--<td>{{$record->user_id}}</td>--}}
                            {{--</tr>--}}
                            <tr>
                                <th width="20%">{{trans('biography::biography.title')}}</th>
                                <td>{{$record->title}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('biography::biography.spot')}}</th>
                                <td>{{$record->spot}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('biography::biography.name')}}</th>
                                <td>{{$record->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('biography::biography.slug')}}</th>
                                <td>{{$record->slug}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('biography::biography.short_url')}}</th>
                                <td>{{$record->short_url}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('biography::biography.content')}}</th>
                                <td>{{$record->content}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('biography::biography.photo')}}</th>
                                <td>{{$record->photo}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('biography::biography.description')}}</th>
                                <td>{{$record->description}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('biography::biography.keywords')}}</th>
                                <td>{{$record->keywords}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('biography::biography.hit')}}</th>
                                <td>{{$record->hit}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('biography::biography.order')}}</th>
                                <td>{{$record->order}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('biography::biography.status')}}</th>
                                <td>{!!$record->status ? '<label class="badge badge-green">' . trans('common.active') . '</label>' : '<label class="badge badge-brown">' . trans('common.passive') . '</label>'!!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('biography::biography.is_cuff')}}</th>
                                <td>{!!$record->cuff ? '<label class="badge badge-green">' . trans('common.active') . '</label>' : '<label class="badge badge-brown">' . trans('common.passive') . '</label>'!!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('biography::biography.is_active')}}</th>
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
    <script type="text/javascript">
        //active menu
        activeMenu('biograpy_manager', '');
    </script>
@endsection
