@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('dashboard.home_page')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i>{{trans('dashboard.home_page')}}</a></li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="box box-widget">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow" style="padding: 20px 15px;">
                    <h3 class="widget-user-username" style="margin: 0;"><i
                                class="fa fa-bullhorn"></i> {{trans('dashboard.announcements')}}</h3>
                </div>
                <div class="box-footer no-padding" style="max-height: 400px;overflow: scroll;">
                    <ul class="nav nav-stacked" id="announce-list">
                        @foreach($userGroupsAnnouncements as $userGroupsAnnouncement)
                            <li id="announce-{{$userGroupsAnnouncement->id}}" class="announce"
                                data-id="announce-{{$userGroupsAnnouncement->id}}">
                                <a href="#announce-modal" data-id="announce-{{$userGroupsAnnouncement->id}}"
                                   data-toggle="modal">{{$userGroupsAnnouncement->title}}<span
                                            class="pull-right badge bg-blue">{{$userGroupsAnnouncement->show_time}}</span></a>
                                <div class="list-data" data-offset="{{$userGroupsAnnouncement->order}}"
                                     style="display: none;" data-id="announce-{{$userGroupsAnnouncement->id}}">
                                    <div class="title">{{$userGroupsAnnouncement->title}}</div>
                                    <div class="description">{{$userGroupsAnnouncement->description}}</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
            <div class="modal fade" id="announce-modal">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">
                                <i class="fa fa-bullhorn"></i> {{trans('dashboard.announcements')}}
                            </h4>
                        </div>
                        <div class="modal-body">
                            <h2 class="title" style="margin: 0 0 10px 0;"></h2>
                            <div class="m-content"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">{{trans('dashboard.close')}}</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div><!-- /.col -->

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
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#announce-modal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var dataid = button.data('id'); // Extract info from data-* attributes
                var title = "", description = "";
                $('.announce').each(function () {
                    var currentId = $(this).find('.list-data').data('id');
                    if (dataid === currentId) {
                        title = $(this).find('.list-data .title').html();
                        description = $(this).find('.list-data .description').html();
                    }
                });

                var modal = $(this);
                modal.find('.title').html(title);
                modal.find('.m-content').html(description);
            });
            //active menu
            activeMenu('home', '');
        });
    </script>
@endsection