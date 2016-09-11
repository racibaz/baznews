@extends($activeTheme .'::backend.master')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('news.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('common.create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('news.managment')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="countries" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('news.title')}}</th>
                            <th>{{trans('news.hit')}}</th>
                            <th>{{trans('news.status')}}</th>
                            <th>{{trans('news.band_news')}}</th>
                            <th>{{trans('news.box_cuff')}}</th>
                            <th>{{trans('news.is_cuff')}}</th>
                            <th>{{trans('news.break_news')}}</th>
                            <th>{{trans('news.is_comment')}}</th>
                            <th>{{trans('news.main_cuff')}}</th>
                            <th>{{trans('news.mini_cuff')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('news.show', $record->title , $record, [] ) !!}</td>
                                    <td> {{$record->hit}} </td>
                                    <td> {{$record->status}} </td>
                                    <td> {{$record->band_news}} </td>
                                    <td> {{$record->box_cuff}} </td>
                                    <td> {{$record->is_cuff}} </td>
                                    <td> {{$record->break_news}} </td>
                                    <td> {{$record->is_comment}} </td>
                                    <td> {{$record->main_cuff}} </td>
                                    <td> {{$record->mini_cuff}} </td>
                                    <td>{!!$record->is_active ? '<label class="badge badge-green">' . trans('common.active') . '</label>' : '<label class="badge badge-brown">' . trans('common.passive') . '</label>'!!}</td>
                                    <td>
                                        <div class="btn-group">
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('news.destroy',  $record))) !!}

                                            {!! link_to_route('news.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}


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
                            <th>{{trans('news.title')}}</th>
                            <th>{{trans('news.hit')}}</th>
                            <th>{{trans('news.status')}}</th>
                            <th>{{trans('news.band_news')}}</th>
                            <th>{{trans('news.box_cuff')}}</th>
                            <th>{{trans('news.is_cuff')}}</th>
                            <th>{{trans('news.break_news')}}</th>
                            <th>{{trans('news.is_comment')}}</th>
                            <th>{{trans('news.main_cuff')}}</th>
                            <th>{{trans('news.mini_cuff')}}</th>
                            <th>{{trans('common.is_active')}}</th>
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