@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('module_manager.management')}}
            <small>{{trans('module_manager.list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('module_manager.index') !!}"> {{trans('module_manager.management')}}</a></li>
            <li class="active">{{trans('module_manager.list')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('module_manager.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('module_manager.create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('module_manager.management')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{trans('module_manager.name')}}</th>
                                <th>{{trans('module_manager.is_active')}}</th>
                                <th>{{trans('module_manager.refresh')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($modules as $module)
                                <tr>
                                    <th>{{ $module['name'] }} </th>
                                    @if(Module::isEnabled($module['slug']))
                                        <td>
                                            {!! link_to_route('moduleActivationToggle', \Caffeinated\Modules\Facades\Module::isEnabled($module['slug']) ? 'Aktif' : 'Pasif' , $module['slug'], ['class'=>'btn btn-success'] ) !!}</td>
                                        <td>{!! link_to_route('moduleReset', trans('module_manager.refresh') , $module['slug'], ['class'=>'btn btn-info'] ) !!}</td>
                                    @else
                                        <td>{!! link_to_route('moduleActivationToggle', \Caffeinated\Modules\Facades\Module::isEnabled($module['slug']) ? 'Aktif' : 'Pasif' , $module['slug'], ['class'=>'btn btn-success'] ) !!}</td>
                                        <td>{!! link_to_route('moduleRefreshAndSeed', trans('module_manager.refresh') , $module['slug'], ['class'=>'btn btn-info'] ) !!}</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table id="modules" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('module_manager.name')}}</th>
                                <th>{{trans('common.is_active')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('module_manager.show', $record->name , $record, [] ) !!}</td>
                                    <td>{!!$record->is_active ? '<label class="badge badge-green">' . trans('common.active') . '</label>' : '<label class="badge badge-brown">' . trans('common.passive') . '</label>'!!}</td>
                                    <td>
                                        <div class="btn-group">
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('module_manager.destroy',  $record))) !!}

                                            {!! link_to_route('module_manager.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}


                                            {!! Form::submit('Sil', ['class' => 'btn btn-danger btn-xs','data-toggle'=>'confirmation']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('module_manager', '');
    </script>
@endsection