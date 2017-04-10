@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('user.user_management')}}
            <small>{{trans('user.user_list_title')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> {{trans('dashboard.home_page')}}</a></li>
            <li>{{trans('user.user_management')}}</li>
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
                    <?php
                    $default = Redis::get('url') . "/default_user_avatar.jpg";
                    $size = 150;
                    $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $record->email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
                    ?>

                    <img class="profile-user-img img-responsive img-circle" src="<?php echo $grav_url; ?>" alt="{{$record->name}}"/>

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
                                <th>Aktif/Pasif</th>
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

                    <p class="text-muted">{{$record->country_id}} , {{$record->city_id}}</p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> {{trans('user.bio_note')}} </strong>

                    <p>{{$record->bio_note}}</p>
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

