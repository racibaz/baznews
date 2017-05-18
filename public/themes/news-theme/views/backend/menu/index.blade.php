@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('menu.management')}}
            <small>{{trans('menu.menu_list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('menu.index') !!}"> {{trans('menu.management')}}</a></li>
            <li class="active">{{trans('menu.menu_list')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('menu.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('menu.menu_create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <div class="box-header with-border">
                        <h3 class="box-title"><strong>{{trans('menu.menu_list')}}</strong></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <pre>{!! $recordsTreeJson !!}</pre>
                    <div id="menu_tree"></div>
                    @include($activeTheme . '::backend.partials.tree',$recordsTree)

                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('menu.name')}}</th>
                            <th>{{trans('menu.order')}}</th>
                            <th>{{trans('menu.is_active')}}</th>
                            <th>{{trans('menu.edit_delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('menu.show', $record->name , $record, [] ) !!}</td>
                                    <th>{{$record->order}}</th>
                                    <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                    <td>
                                        <div class="btn-group">
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('menu.destroy',  $record))) !!}
                                            {!! link_to_route('menu.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
                                            {!! Form::submit('Sil', ['class' => 'btn btn-danger btn-xs','data-toggle'=>'confirmation']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>{{trans('menu.name')}}</th>
                            <th>{{trans('menu.order')}}</th>
                            <th>{{trans('menu.is_active')}}</th>
                            <th>{{trans('menu.edit_delete')}}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('css')
    <link href="{{ Theme::asset($activeTheme . '::js/jstree/dist/themes/default/style.min.css') }}" rel="stylesheet">
@stop
@section('js')
    <script src="{{ Theme::asset($activeTheme .'::js/jstree/dist/jstree.min.js') }}"></script>
    <script type="text/javascript">
        //active menu
        activeMenu('menu_management', '');
        $('#menu_tree').jstree({ 'core' : {
            'data' : {!! $recordsTreeJson !!},
        }});

    </script>
@endsection