@extends($activeTheme . '::backend.master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--Top header start-->
                <h3 class="ls-top-header">Kullanıcılar</h3>
                <!--Top header end -->

                <!--Top breadcrumb start -->
                <ol class="breadcrumb">
                    <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                    <li>Kullanıcılar</li>
                    <li class="active">{{$record->first_name}}</li>
                </ol>
                <!--Top breadcrumb start -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div style="margin-bottom: 20px;">
                    {{ link_to_route('admin.user.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-md'] ) }}
                </div>
            </div><!-- end col-md-12 -->
        </div><!-- end row -->
        <!-- Main Content Element  Start-->
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-light-blue">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$record->first_name}}</h3>
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
                                        <td>{{$record->first_name}}</td>
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
                </div>
            </div>
        </div><!-- end row -->
        <!-- Main Content Element  End-->
    </div><!-- container-fluid -->
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('group','widget_management');
    </script>
@endsection
