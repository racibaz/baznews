@extends($activeTheme . '::backend.master')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('event.management')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="countries" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('event.eventable_type')}}</th>
                            <th>{{trans('event.eventable_id')}}</th>
                            <th>{{trans('event.user_id')}}</th>
                            <th>{{trans('event.event')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td> {{ $record->eventable_type }} </td>
                                    <td> {{ $record->eventable_id }} </td>
                                    <td>{!! link_to_route('user.show', $record->user->name , $record, [] ) !!}</td>
                                    <td> {{ $record->event }} </td>
                                    <td>
                                        <div class="btn-group">
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('event.destroy',  $record))) !!}

                                            {!! link_to_route('event.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}


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
                            <th>{{trans('event.eventable_type')}}</th>
                            <th>{{trans('event.eventable_id')}}</th>
                            <th>{{trans('event.user_id')}}</th>
                            <th>{{trans('event.event')}}</th>
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
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('event','');
    </script>
@endsection