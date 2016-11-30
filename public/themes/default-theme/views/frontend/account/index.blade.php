@extends('default-theme::frontend.master')

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('account.managment')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="accounts" class="table table-bordered table-hover table-data">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>İsim</th>
                            <th>mail</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>{!! link_to_route('account.show', $record->name, $record, [] ) !!}</td>
                                <td>{{$record->email}}</td>
                                <td>
                                    <div class="btn-group">
                                        {!! link_to_route('account.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
                                    </div>
                                </td>
                            </tr>
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