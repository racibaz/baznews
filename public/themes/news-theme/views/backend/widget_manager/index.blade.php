@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('widget_manager.management')}}
            <small>{{trans('widget_manager.list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('widget_manager.index') !!}"> {{trans('widget_manager.management')}}</a></li>
            <li class="active">{{trans('widget_manager.list')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3" id="sidebar">
            {{--{{$widgets['News']['name']}}--}}
            @foreach($widgets as $widget)
                {{--DB ye eklenmiş olan widgetları listelemiyoruz--}}
                @if(in_array($widget['slug'] ,$records->pluck('slug')->toArray()))
                    @continue
                @endif

                {{--{!! link_to_route('addWidgetActivation', trans('widget_manager.passive') , $widget['slug'], [] ) !!}--}}
                <div class="box box-default box-solid collapsed-box">
                    {!! Form::open(['route' => 'addWidgetActivation','method' => 'post']) !!}
                    @if(!in_array($widget['slug'] ,$records->pluck('slug')->toArray()))
                        <div class="box-header with-border">
                            <h3 class="box-title">{{trans('widget_manager.module_name')}}: {{$widget['module_name']}}
                                ({{$widget['name']}})</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-plus"></i> Detay
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::select('group', $widgetGroupList , null, ['placeholder' => trans('widget_manager.widget_group_choose'),'class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button class="btn btn-success btn-block" type="submit"><i
                                                    class="fa fa-check-square-o"></i> {{trans('widget_manager.widget_active')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{Form::hidden('widgetSlug',$widget['slug'])}}
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-text">
                                    <b>{{trans('widget_manager.name')}}: </b>
                                    {{$widget['name']}}
                                </li>
                                <li class="list-group-item list-group-item-text">
                                    <b>{{trans('widget_manager.slug')}}: </b>
                                    {{$widget['slug']}}
                                </li>
                                <li class="list-group-item list-group-item-text">
                                    <b>{{trans('widget_manager.namespace')}}: </b>
                                    {{$widget['namespace']}}
                                </li>
                                <li class="list-group-item list-group-item-text">
                                    <b>{{trans('widget_manager.version')}}: </b>
                                    {{$widget['version']}}
                                </li>
                                <li class="list-group-item list-group-item-text">
                                    <b>{{trans('widget_manager.description')}}: </b>
                                    {{$widget['description']}}
                                </li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    @endif
                    {!! Form::close() !!}
                </div><!-- /.box -->
            @endforeach
        </div>
        <div class="col-md-9" id="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('widget_manager.management')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table id="widget_managers" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('widget_manager.name')}}</th>
                            <th>{{trans('widget_manager.position')}}</th>
                            <th>{{trans('widget_manager.widget_group')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                            <th>{{trans('widget_manager.edit_delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>{!! link_to_route('widget_manager.show', $record->name , $record, [] ) !!}</td>
                                <td>{{ $record->position }}</td>
                                <td>{{ $record->group}}</td>
                                <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                <td>
                                    <div class="btn-group">
                                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('widget_manager.destroy',  $record))) !!}
                                        {!! link_to_route('widget_manager.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
                                        {!! Form::submit('Sil', ['class' => 'btn btn-danger btn-xs','data-toggle'=>'confirmation']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.summernote').summernote();
        });
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
        //active menu
        activeMenu('widget', 'widget_management');
    </script>
@endsection