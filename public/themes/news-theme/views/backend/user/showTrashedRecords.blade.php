@extends($activeTheme . '::backend.master')

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div style="margin-bottom: 20px;">
                @if(Auth::user()->can('showTrashedRecords-user'))
                    <a href="{{ route('user.index') }}" class="btn btn-info">
                        <i class="fa fa-plus"></i> {{ trans('user.trashed_user') }}
                    </a>
                @endif
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('user.trushed_management')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="users" class="table table-bordered table-hover table-data">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>İsim</th>
                            <th>mail</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($trashedRecords as $trashedRecord)
                            <tr>
                                <td>{{$trashedRecord->id}}</td>
                                <td>{{$trashedRecord->name}}</td>
                                <td>{{$trashedRecord->email}}</td>
                                <td>
                                    <div class="btn-group">
                                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('userHistoryForceDelete',  $trashedRecord->id ))) !!}
                                            {!! Form::hidden('historyForceDeleteRecordId', $trashedRecord->id) !!}
                                            {!! link_to_route('trashedUserRestore', trans('user.trashed_user_restore'), $trashedRecord->id, ['class' => 'btn btn-primary btn-xs'] ) !!}
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
                            <th>İsim</th>
                            <th>Mail</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection