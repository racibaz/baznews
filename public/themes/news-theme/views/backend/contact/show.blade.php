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
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong>{{trans('contact.full_name')}}:</strong>
                    <p class="text-muted">{{$record->full_name}}</p>
                    <hr>
                    <strong>{{trans('contact.subject')}}:</strong>
                    <p class="text-muted">{{$record->subject}}</p>
                    <hr>
                    <strong>{{trans('contact.content')}}:</strong>
                    <div style="padding: 10px;border: 1px solid #c5c5c5; background-color: #e6eaec;border-radius: 3px;">
                        <p class="text-muted">{!!$record->content!!}</p>
                    </div>
                    <hr>
                    <strong>{{trans('contact.email')}}:</strong>
                    <p class="text-muted">{{$record->email}}</p>
                    <hr>
                    <strong>{{trans('contact.phone')}}:</strong>
                    <p class="text-muted">{{$record->phone}}</p>
                    <hr>
                    <strong>{{trans('contact.is_read')}}:</strong>
                    <p class="text-muted">{!!$record->is_read ? '<label class="badge bg-green">' . trans('contact.read') . '</label>' : '<label class="badge bg-brown">' . trans('contact.unread') . '</label>'!!}</p>
                    <hr>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection

