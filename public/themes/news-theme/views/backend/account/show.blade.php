@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--Top header start-->
                <h3 class="ls-top-header">{{trans('account.account_page')}}</h3>
                <!--Top header end -->

                <!--Top breadcrumb start -->
                <ol class="breadcrumb">
                    <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                    <li class="active">{{$record->name}}</li>
                </ol>
                <!--Top breadcrumb start -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div style="margin-bottom: 20px;">

                </div>
            </div><!-- end col-md-12 -->
        </div><!-- end row -->
        <!-- Main Content Element  Start-->
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-light-blue">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! link_to_route('account.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive ls-table">
                            <table class="table table-bordered table-bottomless table-hover ">
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
                                {{--<tr>--}}
                                {{--<th>Grupları</th>--}}
                                {{--<td>--}}
                                {{--@foreach($record->groups as $group)--}}
                                {{--<span class="label label-default">{{$group->name}}</span>--}}
                                {{--@endforeach--}}
                                {{--</td>--}}
                                {{--</tr>--}}
                                <tr>
                                    <th>Aktif/Pasif</th>
                                    <td>{!!$record->is_active ? '<label class="badge badge-green">Aktif</label>' : '<label class="badge badge-brown">Pasif</label>'!!}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end row -->

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('account.account_revisions')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="accounts" class="table table-bordered table-hover table-data">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('revision.revisionable_type')}}</th>
                            <th>{{trans('revision.revisionable_id')}}</th>
                            <th>{{trans('revision.key')}}</th>
                            <th>{{trans('revision.old_value')}}</th>
                            <th>{{trans('revision.new_value')}}</th>
                            <th>{{trans('revision.created_at')}}</th>
                            <th>{{trans('revision.updated_at')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($revisions as $index => $revison)
                            <tr>
                                <td>{{++$index}}</td>
                                <td>{{$revison->revisionable_type }}</td>
                                <td>{{$revison->revisionable_id }}</td>
                                <td>{{$revison->key }}</td>
                                <td>{{$revison->old_value }}</td>
                                <td>{{$revison->new_value }}</td>
                                <td>{{$revison->created_at }}</td>
                                <td>{{$revison->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>{{trans('revision.revisionable_type')}}</th>
                            <th>{{trans('revision.revisionable_id')}}</th>
                            <th>{{trans('revision.key')}}</th>
                            <th>{{trans('revision.old_value')}}</th>
                            <th>{{trans('revision.new_value')}}</th>
                            <th>{{trans('revision.created_at')}}</th>
                            <th>{{trans('revision.updated_at')}}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('account.events')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="accounts" class="table table-bordered table-hover table-data">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('event.eventable_type')}}</th>
                            <th>{{trans('event.eventable_id')}}</th>
                            <th>{{trans('event.event')}}</th>
                            <th>{{trans('event.created_at')}}</th>
                            <th>{{trans('event.updated_at')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $index => $event)
                            <tr>
                                <td>{{++$index}}</td>
                                <td>{{$event->eventable_type }}</td>
                                <td>{{$event->eventable_id }}</td>
                                <td>{{$event->event }}</td>
                                <td>{{$event->created_at }}</td>
                                <td>{{$event->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>{{trans('event.eventable_type')}}</th>
                            <th>{{trans('event.eventable_id')}}</th>
                            <th>{{trans('event.event')}}</th>
                            <th>{{trans('event.created_at')}}</th>
                            <th>{{trans('event.updated_at')}}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>


        <!-- Main Content Element  End-->
    </div><!-- container-fluid -->


@endsection

