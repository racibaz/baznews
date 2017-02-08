@extends($activeTheme . '::backend.master')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <ul>
                {{--{{$widgets['News']['name']}}--}}
                @foreach($widgets as $widget)
                    {{--DB ye eklenmiş olan widgetları listelemiyoruz--}}
                    @if(in_array($widget['slug'] ,$records->pluck('slug')->toArray()))
                        @continue
                    @endif

                    <li>{{trans('widget_manager.module_name')}} : {{$widget['module_name']}}
                        @if(!in_array($widget['slug'] ,$records->pluck('slug')->toArray()))
                            {!! link_to_route('addWidgetActivation', trans('widget_manager.passive') , $widget['slug'], [] ) !!}
                        @endif
                    </li>
                        <ul>
                            <li>{{trans('widget_manager.name')}} : {{$widget['name']}}</li>
                            <li>{{trans('widget_manager.slug')}} : {{$widget['slug']}}</li>
                            <li>{{trans('widget_manager.namespace')}} : {{$widget['namespace']}}</li>
                            <li>{{trans('widget_manager.version')}} : {{$widget['version']}}</li>
                            <li>{{trans('widget_manager.description')}} : {{$widget['description']}}</li>
                        </ul>
                @endforeach
            </ul>


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('widget_manager.managment')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table id="countries" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('widget_manager.name')}}</th>
                            <th>{{trans('widget_manager.position')}}</th>
                            <th>{{trans('widget_manager.widget_group')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('widget_manager.show', $record->name , $record, [] ) !!}</td>
                                    <td>{{ $record->position }}</td>
                                    <td>{{ $record->widget_group->name }}</td>
                                    <td>{!!$record->is_active ? '<label class="badge badge-green">' . trans('common.active') . '</label>' : '<label class="badge badge-brown">' . trans('common.passive') . '</label>'!!}</td>
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
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>{{trans('widget_manager.name')}}</th>
                            <th>{{trans('widget_manager.position')}}</th>
                            <th>{{trans('widget_manager.widget_group')}}</th>
                            <th>{{trans('common.is_active')}}</th>
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