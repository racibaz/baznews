@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::photo_category.management')}}
            <small>{{$record->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('photo_category.index') !!}">{{trans('news::photo_category.management')}}</a>
            </li>
            <li class="active">{{$record->name}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-solid">
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
                            <tr>
                                <th>{{trans('common.id')}}</th>
                                <td>{{$record->id}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_category.name')}}</th>
                                <td>{{$record->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_category._lft')}}</th>
                                <td>{{$record->_lft}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_category._rgt')}}</th>
                                <td>{{$record->_rgt}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_category.slug')}}</th>
                                <td>{{$record->slug}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_category.description')}}</th>
                                <td>{{$record->description}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_category.keywords')}}</th>
                                <td>{{$record->keywords}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_category.icon')}}</th>
                                <td{{$record->icon}}></td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_category.is_cuff')}}</th>
                                <td>{!!$record->is_cuff ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_category.is_active')}}</th>
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
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('photo_category', 'news_management');
    </script>
@endpush

