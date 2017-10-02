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
                                <th>{{trans('common.is_active')}}</th>
                                <th>{{trans('module_manager.refresh')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($modules as $module)
                                <tr>
                                    <th>{{ $module['name'] }} </th>
                                    @if(Module::isEnabled($module['slug']))
                                        <td>
                                            {!! link_to_route('moduleActivationToggle', 'Aktif', $module['slug'], ['class'=>'btn btn-success'] ) !!}</td>
                                        <td>{!! link_to_route('moduleReset', trans('module_manager.remove_data') , $module['slug'], ['class'=>'btn btn-danger'] ) !!}</td>
                                    @else
                                        <td>{!! link_to_route('moduleActivationToggle', 'Pasif' , $module['slug'], Module::isEnabled($module['slug']) ? ['class'=>'btn btn-success'] : ['class'=>'btn btn-danger'] ) !!}</td>
                                        <td>{!! link_to_route('moduleRefreshAndSeed', trans('module_manager.seed_data'), $module['slug'], ['class'=>'btn btn-info'] ) !!}</td>
                                    @endif
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
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('module_manager', '');
    </script>
@endpush