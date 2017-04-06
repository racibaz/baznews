@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('user.user_management')}}
            <small>{{trans('user.user_list_title')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> {{trans('dashboard.name')}}</a></li>
            <li class="active">{{$record->first_name}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-12">
            <div style="margin-bottom: 20px;">
                {{ link_to_route('user.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-md'] ) }}
            </div>
        </div><!-- end col-md-12 -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('user.user_info')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive ls-table">
                        <table class="table table-bordered table-bottomless table-hover " style="margin-bottom: 0;">
                            <thead>
                            <tr>
                                <th width="20%">Tanım</th>
                                <th width="80%">Bilgi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Ad Soyad</th>
                                <td>{{$record->name}}</td>
                            </tr>
                            <tr>
                                <th>E-Posta</th>
                                <td>{{$record->email}}</td>
                            </tr>
                            <tr>
                                <th>Rolleri</th>
                                <td>
                                    @foreach($record->roles as $role)
                                        <span class="label label-default">{{$role->name}}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Grupları</th>
                                <td>
                                    @foreach($record->groups as $group)
                                        <span class="label label-default">{{$group->name}}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Aktif/Pasif</th>
                                <td>{!!$record->is_active ? '<label class="badge badge-green">Aktif</label>' : '<label class="badge badge-brown">Pasif</label>'!!}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title"><strong>{{trans('user.user_revisions')}}</strong></h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="users" class="table table-bordered table-hover table-data">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('user.revisionable_type')}}</th>
                                    <th>{{trans('user.revisionable_id')}}</th>
                                    <th>{{trans('user.key')}}</th>
                                    <th>{{trans('user.old_value')}}</th>
                                    <th>{{trans('user.new_value')}}</th>
                                    <th>{{trans('user.created_at')}}</th>
                                    <th>{{trans('user.updated_at')}}</th>
                                    <th>{{trans('common.is_active')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($revisions as $revison)
                                    <tr>
                                        <td>{{$revison->id}}</td>
                                        <td>{{$revison->revisionable_type }}</td>
                                        <td>{{$revison->revisionable_id }}</td>
                                        <td>{{$revison->key }}</td>
                                        <td>{{$revison->old_value }}</td>
                                        <td>{{$revison->new_value }}</td>
                                        <td>{{$revison->created_at }}</td>
                                        <td>{{$revison->updated_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                {{--TODO revision CRUD işlemrlerinin yapıldığı yere düzenle ve sil linkleri verilecek.--}}
                                                {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('user.destroy',  $record))) !!}
                                                {!! link_to_route('user.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
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
                                    <th>{{trans('user.revisionable_type')}}</th>
                                    <th>{{trans('user.revisionable_id')}}</th>
                                    <th>{{trans('user.key')}}</th>
                                    <th>{{trans('user.old_value')}}</th>
                                    <th>{{trans('user.new_value')}}</th>
                                    <th>{{trans('user.created_at')}}</th>
                                    <th>{{trans('user.updated_at')}}</th>
                                    <th>{{trans('common.is_active')}}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-12">
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title"><strong>{{trans('user.user_events')}}</strong></h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="users" class="table table-bordered table-hover table-data">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('user.eventable_type')}}</th>
                                    <th>{{trans('user.eventable_id')}}</th>
                                    <th>{{trans('user.event_name')}}</th>
                                    <th>{{trans('user.created_at')}}</th>
                                    <th>{{trans('user.updated_at')}}</th>
                                    <th>{{trans('user.is_active')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $index => $event)
                                    <tr>
                                        <td>{{$event->id}}</td>
                                        <td>{{$event->eventable_type }}</td>
                                        <td>{{$event->eventable_id }}</td>
                                        <td>{{$event->event }}</td>
                                        <td>{{$event->created_at }}</td>
                                        <td>{{$event->updated_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                {{--TODO revision CRUD işlemrlerinin yapıldığı yere düzenle ve sil linkleri verilecek.--}}
                                                {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('user.destroy',  $record))) !!}
                                                {!! link_to_route('user.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
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
                                    <th>{{trans('user.eventable_type')}}</th>
                                    <th>{{trans('user.eventable_id')}}</th>
                                    <th>{{trans('user.event_name')}}</th>
                                    <th>{{trans('user.created_at')}}</th>
                                    <th>{{trans('user.updated_at')}}</th>
                                    <th>{{trans('user.is_active')}}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>

    </div><!-- end row -->
    <!-- Main Content Element  End-->
@endsection

