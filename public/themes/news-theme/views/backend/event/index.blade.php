@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('event.management')}}
            <small>{{trans('event.event_list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('event.index') !!}"> {{trans('event.management')}}</a></li>
            <li>{{trans('event.event_list')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('event.management')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table id="events" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('event.eventable_type')}}</th>
                            <th>{{trans('event.eventable_id')}}</th>
                            <th>{{trans('event.event')}}</th>
                            <th>{{trans('event.user_id')}}</th>
                            <th>{{trans('common.created_at')}}</th>
                            <th>{{trans('common.updated_at')}}</th>
                            <th>{{trans('common.edit_delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>{!! link_to_route('event.show',$record->event , $record, [] ) !!} </td>
                                <td>
                                    @php
                                        $nameSpaceArray = explode('\\', $record->eventable_type);
                                        $className = str_slug(array_last($nameSpaceArray));
                                    @endphp

                                    @if(Route::has($className . '.show'))
                                        {!! link_to_route($className . '.show', $record->eventable_id , $record->eventable_id, ['target' => '_blank'] ) !!}
                                    @else
                                        {{$record->eventable_id}}
                                    @endif

                                </td>
                                <td>{{$record->eventable_type}}</td>
                                <td>{!! link_to_route('user.show', $record->user->name , $record, [] ) !!}</td>
                                <td>{{$record->created_at}}</td>
                                <td>{{$record->updated_at}}</td>
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
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('event', '');
    </script>
@endpush