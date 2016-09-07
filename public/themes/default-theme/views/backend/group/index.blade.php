@extends('default-theme::backend.master')

@section('content')

    <div style="margin-bottom: 20px;">
        <a href="{{ route('group.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> {{ trans('common.create') }}
        </a>
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Grup Listesi</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="table-responsive">
                <table id="groups" class="table table-bordered table-hover table-data">
                    <thead>
                    <tr>
                        <th>{!! trans('group.name') !!}</th>
                        <th>{!! trans('group.description') !!}</th>
                        <th>{!! trans('common.is_active') !!}</th>
                        <th>{!! trans('common.control') !!}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr class="odd" group="row">
                            <td class="sorting_1">
                                {!! link_to_route('group.show', $record->name, $record, [] ) !!}
                            </td>
                            <td>{{$record->description }}</td>
                            <td>{{$record->is_active }}</td>
                            <td>
                                <div class="btn-group">
                                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('group.destroy',  $record))) !!}
                                    {!! link_to_route('group.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
                                    {!! Form::submit('Sil', ['class' => 'btn btn-danger btn-xs','data-toggle'=>'confirmation']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>{!! trans('group.name') !!}</th>
                        <th>{!! trans('group.description') !!}</th>
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

