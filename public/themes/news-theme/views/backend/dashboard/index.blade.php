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

    <div class="row">
        <div class="col-md-4">
            <div class="box box-widget">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow" style="padding: 20px 15px;">
                    <h3 class="widget-user-username" style="margin: 0;"><i class="fa fa-bullhorn"></i> Duyurular</h3>
                </div>
                <div class="box-footer no-padding" style="max-height: 400px;overflow: scroll;">
                    <ul class="nav nav-stacked">
                        @foreach($userGroupsAnnouncements as $userGroupsAnnouncement)
                            <li><a href="#">{{$userGroupsAnnouncement->title}}<span class="pull-right badge bg-blue">1</span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$activeUserCount}}</h3>

                            <p>{{trans('user.active_user_count')}}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-md-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$activeGroupCount}}</h3>
                            <p>{{trans('group.active_group_count')}}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-md-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$activePageCount}}</h3>
                            <p>{{trans('page.active_page_count')}} </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-text"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->

            </div>
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$passiveUserCount}}</h3>
                            <p>{{trans('user.passive_user_count')}}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-md-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$passiveGroupCount}}</h3>
                            <p>{{trans('group.passive_group_count')}}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-md-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$passivePageCount}}</h3>
                            <p>{{trans('page.passive_page_count')}}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-text"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- ./row -->
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-list"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{trans('menu.active_menu_count')}}</span>
                    <span class="info-box-number">{{$activeMenuCount}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-list"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{trans('menu.passive_menu_count')}}</span>
                    <span class="info-box-number">{{$passiveMenuCount}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-phone"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{trans('contact.passive_contact_message_count')}}</span>
                    <span class="info-box-number">{{$passiveContactMessageCount}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- ./col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-file-text"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{trans('advertisement.active_advertisement_count')}}</span>
                    <span class="info-box-number">{{$activeAdsCount}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

@endsection