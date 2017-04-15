@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('menu.management')}}
            <small>{{$record->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('menu.index') !!}"> {{trans('menu.management')}}</a></li>
            <li class="active">{{$record->name}}</li>
        </ol>
    </section>
@endsection
@section('content')



    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('menu.name').' > '.$record->name}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
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
                                    <td width="20%"><b>{{trans('menu.name')}}:</b></td>
                                    <td width="80%">{{$record->name}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{trans('menu.parent_menu')}}:</b></td>
                                    <td>{{$record->parent_id}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{trans('menu.site_page')}}:</b></td>
                                    <td>{{$record->parent_id}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{trans('menu.sort_left')}}:</b></td>
                                    <td>{{$record->_lft}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{trans('menu.sort_right')}}:</b></td>
                                    <td>{{$record->_rgt}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{trans('menu.site_page')}}:</b></td>
                                    <td>{{$record->page_id}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{trans('menu.slug')}}:</b></td>
                                    <td>{{$record->slug}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{trans('menu.url')}}:</b></td>
                                    <td>{{$record->url}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{trans('menu.category')}}:</b></td>
                                    <td>{{$record->route}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{trans('menu.target')}}:</b></td>
                                    <td>{{$record->target}}</td>
                                </tr>
                                <tr>
                                    <td><b>{{trans('menu.order')}}:</b></td>
                                    <td>{{$record->order}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- .col-md-6 -->
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('menu_management','');
    </script>
@endsection
