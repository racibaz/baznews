@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('role.management')}}
            <small>{{$record->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('role.index') !!}">{{trans('role.management')}}</a></li>
            <li class="active">{{$record->name}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
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
                            <tr>
                                <th width="20%">{{trans('role.name')}}</th>
                                <td>{{$record->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('role.display_name')}}</th>
                                <td>{{$record->display_name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('role.description')}}</th>
                                <td>{{$record->description}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('role.is_active')}}</th>
                                <td>{!! $record->is_active ? '<span class="badge bg-green">'.trans('role.active').'</span>' : '<span class="badge bg-brown">'.trans('role.passive').'</span>' !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('role.role_permission_management')}}</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body perm">
                    @foreach($perms as $index => $perm)
                        <div class="form-group">
                            <label for="{{$perm->id}}">
                                {!! Form::checkbox('permission_role_store_[]', $perm->id, in_array($perm->id , $record->permissions->pluck('id')->toArray()),['class'=>'check','disabled']) !!}
                                :
                                {{ ++$index }} : {{ $perm->name }} --- {{ $perm->display_name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('role', 'user_management');
    </script>
@endsection
