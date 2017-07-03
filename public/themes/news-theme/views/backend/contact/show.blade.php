@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('contact.management')}}
            <small>{{$record->subject}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('contact.index') !!}"> {{trans('contact.management')}}</a></li>
            <li class="active">{{$record->subject}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->subject}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="padding: 0;">
                    <table class="table table-bordered table-hover" style="margin: 0;">
                        <tbody>
                        <tr>
                            <th width="20%">{{trans('contact.full_name')}}:</th>
                            <td>{{$record->full_name}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('contact.subject')}}:</th>
                            <td>{{$record->subject}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('contact.content')}}:</th>
                            <td>{!!$record->content!!}</td>
                        </tr>
                        <tr>
                            <th>{{trans('contact.email')}}:</th>
                            <td>{{$record->email}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('contact.phone')}}:</th>
                            <td>{{$record->phone}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('contact.is_read')}}:</th>
                            <td>{!!$record->is_read ? '<label class="badge bg-green">' . trans('contact.read') . '</label>' : '<label class="badge bg-brown">' . trans('contact.unread') . '</label>'!!}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('contact_management', '');
    </script>
@endsection