@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('user.user_management')}}
            <small>{{trans('user.user_list_title')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('user.index') !!}"> {{ trans('user.user_management') }} </a></li>
            <li class="active">{{$record->name}}</li>
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
                <!-- /.box-header -->
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{\App\Models\User::getUserAvatar($record->email, 150)}}"
                         alt="{{$record->name}}"/>

                    <h3 class="profile-username text-center">{{$record->name}}</h3>

                    <p class="text-muted text-center">{{$record->email}}</p>

                    <div class="table-responsive ls-table">
                        <table class="table table-bordered table-bottomless table-hover " style="margin-bottom: 0;">
                            <tbody>
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
                                <th>{{trans('common.is_active')}}</th>
                                <td>{!!$record->status ? '<label class="badge bg-green">Aktif</label>' : '<label class="badge bg-brown">Pasif</label>'!!}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div><!-- /.box-profile -->
                </div><!-- /.box -->
            </div><!-- /.box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('user.about')}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-map-marker margin-r-5"></i> {{trans('user.adress')}}</strong>
                    <p class="text-muted">{{$record->country->name}} , {{$record->city->name}}</p>
                    <hr>
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> {{trans('user.bio_note')}} </strong>
                    <p>{{$record->bio_note}}</p>
                    <hr>
                    <strong><i class="fa fa-external-link margin-r-5"></i> {{trans('user.web_site')}} </strong>
                    <p>{{$record->web_site}}</p>
                </div>
                <!-- /.box-body -->
            </div>
        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title"><strong>{{trans('user.user_revisions')}}</strong></h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <ul class="timeline">

                            @foreach($revisions as $revison)
                                <!-- timeline time label -->
                                    <li class="time-label">
                                    <span class="bg-red">
                                        {{$revison->updated_at}}
                                    </span>
                                    </li>
                                    <!-- /.timeline-label -->

                                    <!-- timeline item -->
                                    <li>
                                        <!-- timeline icon -->
                                        <i class="fa fa-globe bg-blue"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> {{$revison->updated_at}}</span>

                                            <h3 class="timeline-header">{{ $revison->userResponsible()->first_name }}</h3>

                                            <div class="timeline-body">

                                                <div>{{$revison->id}}</div>
                                                <div>{{$revison->revisionable_type }}</div>
                                                <div>{{$revison->revisionable_id }}</div>
                                                <div>{{$revison->key }}</div>
                                                <br>
                                                <div class="panel panel-danger">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Eski İçerik</h3>
                                                    </div>
                                                    <div class="change-content">
                                                        {!! $revison->oldValue()  !!}
                                                    </div>
                                                </div>
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Yeni İçerik</h3>
                                                    </div>
                                                    <div class="change-content">
                                                        {!! $revison->newValue()  !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                @endforeach
                            </ul>
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
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
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
                                    <th>{{trans('common.created_at')}}</th>
                                    <th>{{trans('common.updated_at')}}</th>
                                    <th>{{trans('common.edit_delete')}}</th>
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
                                                {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('event.destroy',  $event))) !!}
                                                    @permission('edit-event')
                                                        {!! link_to_route('event.edit', trans('common.edit'), $event, ['class' => 'btn btn-primary btn-xs'] ) !!}
                                                    @endpermission
                                                    @permission('destroy-event')
                                                        {!! Form::submit('Sil', ['class' => 'btn btn-danger btn-xs','data-toggle'=>'confirmation']) !!}
                                                    @endpermission
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
                                    <th>{{trans('common.created_at')}}</th>
                                    <th>{{trans('common.updated_at')}}</th>
                                    <th>{{trans('common.edit_delete')}}</th>
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
@push('js')
    <script type="text/javascript">
        //Menü active code...
        //active menu
        activeMenu('user_management', 'user');
    </script>
@endpush
