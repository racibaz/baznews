@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::news_category.management')}}
            <small>{{$record->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('news_category.index') !!}">{{trans('news::news_category.management')}}</a></li>
            <li class="active">{{$record->name}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-8">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::news_category.name')}}: {{$record->name}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
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
                                <th width="20%">{{trans('news::news_category.name')}}:</th>
                                <td>{{$record->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news_category.parent_id')}}:</th>
                                <td>{{$record->parent_id }}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news_category.slug')}}:</th>
                                <td>{{$record->slug}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news_category.hit')}}:</th>
                                <td>{{$record->hit}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news_category.description')}}:</th>
                                <td>{{$record->description}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news_category.keywords')}}:</th>
                                <td>{{$record->keywords}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
            </div><!-- /.box-solid -->
        </div><!-- /.col-md-8 -->
        <div class="col-md-4">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::news_category.status')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
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
                                <th width="20%">{!! trans('news::news_category._lft') !!}:</th>
                                <td>{{$record->_lft}}</td>
                            </tr>
                            <tr>
                                <th>{!! trans('news::news_category._rgt') !!}:</th>
                                <td>{{$record->_rgt}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news_category.is_cuff')}}:</th>
                                <td>{{$record->is_cuff}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::common.is_active')}}:</th>
                                <td>{{$record->is_active}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box-solid -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::news_category.thumbnail')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <div class="thumbnail">
                            <img src="{{$record->thumbnail}}" alt="{{$record->name}}">
                        </div>
                    </div>
                </div>
            </div><!-- /.box-solid -->
        </div><!-- /.col-md-4 -->
    </div><!-- end row -->

@endsection

