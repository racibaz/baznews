@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('event.management')}}
            <small>{{$record->event}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('event.index') !!}"> {{trans('event.management')}}</a></li>
            <li>{{$record->event}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->event}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="padding: 0;">
                    <table class="table table-hover" style="margin: 0;">
                        <tbody>
                        <tr>
                            <th>{{trans('event.event')}}</th>
                            <td>{{$record->event}}</td>
                        </tr>
                        <tr>
                            <th>{{trans('event.eventable_type')}}</th>
                            <td>{{$record->eventable_type}}</td>
                        </tr>
                        <tr>
                            <th width="20%">{{trans('event.user_id')}}</th>
                            <td>{!! link_to_route('user.show', $record->user->name , $record, [] ) !!}</td>
                        </tr>
                        <tr>
                            <th>{{trans('event.eventable_id')}}</th>
                            <td>{{$record->eventable_id}}</td>
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
        activeMenu('event', '');
    </script>
@endsection

