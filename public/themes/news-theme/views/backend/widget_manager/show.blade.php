@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('module_manager.management')}}
            <small>{{trans('menu.edit_create')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('module_manager.index') !!}"> {{trans('module_manager.management')}}</a></li>
            <li class="active">{{trans('module_manager.edit_create')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Expandable</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: block;">

                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>{{trans('widget_manager.name')}}</th>
                            <td>{{$record->name}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('widget_manager.slug')}}</th>
                            <td>{{$record->slug}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('widget_manager.module_name')}}</th>
                            <td>{{$record->module_name}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('widget_manager.namespace')}}</th>
                            <td>{{$record->namespace}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('widget_manager.position')}}</th>
                            <td>{{$record->position}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('widget_manager.widget_group')}}</th>
                            <td>{{$record->group}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('widget_manager.is_active')}}</th>
                            <td>{{$record->is_active}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('widget','widget_management');
    </script>
@endsection