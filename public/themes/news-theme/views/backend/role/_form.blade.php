@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('permission.management')}}
            <small>{{trans('role.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('role.index') !!}">{{trans('role.management')}}</a></li>
            <li class="active">{{trans('role.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['role.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'role.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Uyarı!</strong> Değiştirilken dikkat edilmesi gerekiyor gibilerine mesaj yazılmalı.
                Kendi super_admin ise user_admin role ismini değiştirdiğinde yetkileri gidecektir.
            </div>
        </div>
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('role.create_edit')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">

                            {!! Form::label('name', trans('role.name'),['class'=> 'col-lg-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::text('name', $record->name, ['placeholder' => trans('role.name') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('display_name', trans('role.display_name'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('display_name', $record->display_name, ['placeholder' => trans('role.display_name') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                <b>{{trans('common.status')}}</b>
                            </div>
                            <div class="col-lg-10">
                                <label>
                                    {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                    {{trans('common.is_active')}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-success" type="submit"><i
                                            class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                            </div>
                        </div>
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

                    <div class="form-group">
                        <label for="allCheck">
                            <input type="checkbox" class="all">
                            &nbsp;<span>{{trans('role.all_check')}}</span>
                        </label>
                    </div>
                    <hr>
                    @foreach($perms as $index => $perm)
                        <div class="form-group">
                            <label for="{{$perm->id}}">
                                {!! Form::checkbox('permission_role_store_[]', $perm->id, in_array($perm->id , $record->permissions->pluck('id')->toArray()),['class'=>'check']) !!}
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
        <!-- Main Content Element  End-->
    </div><!-- end row -->
    {!! Form::close() !!}
@endsection
@push('js')
    <script type="text/javascript">
        var checkAll = $('input.all');
        var checkboxes = $('input.check');

        checkAll.on('ifChecked ifUnchecked', function (event) {
            if (event.type === 'ifChecked') {
                checkboxes.iCheck('check');
            } else {
                checkboxes.iCheck('uncheck');
            }
        });

        checkboxes.on('ifChanged', function (event) {
            if (checkboxes.filter(':checked').length === checkboxes.length) {
                checkAll.prop('checked', 'checked');
            } else {
                checkAll.removeProp('checked');
            }
            checkAll.iCheck('update');
        });
        //active menu
        activeMenu('role', 'user_management');
    </script>
@endpush