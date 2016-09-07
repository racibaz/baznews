@extends('default-theme::backend.master')

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-bullhorn"></i> <strong>Duyuru Listesi</strong></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="announcement_list" class="table table-bordered table-hover table-data">
                    <thead>
                    <tr>
                        <th>{!! trans('announcement.title') !!}</th>
                        <th>{!! trans('announcement.description') !!}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td >
                                {{$record->title}}
                            </td>
                            <td>
                                {{$record->description}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>{!! trans('announcement.title') !!}</th>
                        <th>{!! trans('announcement.description') !!}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection

