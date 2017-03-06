@extends($activeTheme . '::backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!--Top header start-->
            <h3 class="ls-top-header">{{trans('role.management')}}</h3>
            <!--Top header end -->

            <!--Top breadcrumb start -->
            <ol class="breadcrumb">
                <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! URL::route('role.index') !!}"> {{ trans('role.roles') }} </a></li>
                <li class="active"> {{ trans('common.add_update') }}</li>
            </ol>
            <!--Top breadcrumb start -->
        </div>
    </div>
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['role.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'role.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-light-blue">
                <div class="panel-heading">
                    {{--<h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>--}}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            Değiştirilken dikkat edilmesi gerekiyor gibilerine mesaj yazılmalı.
                            Kendi super_admin ise user_admin role ismini değiştirdiğinde yetkileri gidecektir.
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
                            {{trans('common.status')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                        <i></i> {{trans('common.is_active')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Role İzin Yonetimi</h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body">
                    {{--<form role="form">--}}
                    @foreach($perms as $index => $perm)
                        <div class="form-group">
                            {{ ++$index }} :
                            {!! Form::checkbox('permission_role_store_[]', $perm->id, in_array($perm->id , $record->permissions->pluck('id')->toArray())) !!} :
                            {{ $perm->name }}  --- {{ $perm->display_name }}
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
</div><!-- end container-fluid -->
@endsection
@section('js')
    <script type="text/javascript">
        $('.btn-all').click(function (e) {
            $('.perm input[type=checkbox]').each(function (e) {
                if(!$(this).prop("checked")){
                    $(this).click();
                }
            });

        });
        $('.btn-remove').click(function (e) {
            $('.perm input[type=checkbox]').each(function (e) {
                if($(this).prop("checked")){
                    $(this).click();
                }
            });
        });
    </script>
@stop