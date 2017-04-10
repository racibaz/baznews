@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('contact.management')}}
            <small>{{trans('contact.contact_list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('contact.index') !!}"> {{trans('contact.management')}}</a></li>
            <li class="active">{{trans('contact.contact_list')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('contact.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('common.create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('contact.contact_list')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="countries" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('contact.subject')}}</th>
                            <th>{{trans('contact.is_read')}}</th>
                            <th>{{trans('contact.edit_delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('contact.show', $record->subject , $record, [] ) !!}</td>
                                    <td>{!!$record->is_read ? '<label class="badge bg-green">' . trans('contact.read') . '</label>' : '<label class="badge bg-brown">' . trans('contact.unread') . '</label>'!!}</td>
                                    <td>
                                        <div class="btn-group">
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('contact.destroy',  $record))) !!}
                                                {!! link_to_route('contact.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
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
                            <th>{{trans('contact.subject')}}</th>
                            <th>{{trans('contact.is_read')}}</th>
                            <th>{{trans('contact.edit_delete')}}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection