@extends('default-theme::backend.master')

@section('content')
    <!-- Content Header (Page header) -->

    <div style="margin-bottom: 20px;">
        <a href="{{ route('permission.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> {{ trans('common.create') }}
        </a>
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><strong>İzin Yönetimi</strong></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="permissions" class="table table-bordered table-hover table-data">
                    <thead>
                    <tr>
                        <th>{!! trans('permission.name') !!}</th>
                        <th>{!! trans('permission.display_name') !!}</th>
                        <th>{!! trans('common.is_active') !!}</th>
                        <th>{!! trans('common.control') !!}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr class="odd" permission="row">
                            <td class="sorting_1">
                                {!! link_to_route('permission.show', $record->name, $record, [] ) !!}
                            </td>
                            <td>{{$record->display_name }}</td>
                            <td>{{$record->is_active }}</td>
                            <td>
                                <div class="btn-group">
                                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('permission.destroy',  $record))) !!}
                                    {!! link_to_route('permission.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
                                    {!! Form::submit('Sil', ['class' => 'btn btn-danger btn-xs','data-toggle'=>'confirmation']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>{!! trans('permission.name') !!}</th>
                        <th>{!! trans('permission.display_name') !!}</th>
                        <th>{!! trans('common.is_active') !!}</th>
                        <th>{!! trans('common.control') !!}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection

