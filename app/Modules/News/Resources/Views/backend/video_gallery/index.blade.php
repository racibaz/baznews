@extends($activeTheme .'::backend.master')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                @if(Auth::user()->can('create-videogallery'))
                    <a href="{{ route('video_gallery.create') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> {{ trans('common.create') }}
                    </a>
                @endif
                @if(Auth::user()->can('forgetCache-videogallery'))
                    <a href="{{ route('forget_photo_gallery_cache') }}" class="btn btn-info">
                        <i class="fa fa-plus"></i> {{ trans('news::photo_gallery.forget_photo_gallery_cache') }}
                    </a>
                @endif
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('video_gallery.managment')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="countries" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('video_gallery.title')}}</th>
                            <th>{{trans('video_gallery.is_cuff')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('video_gallery.show', $record->title , $record, [] ) !!}</td>
                                    <td>{!!$record->is_cuff ? '<label class="badge badge-green">' . trans('common.active') . '</label>' : '<label class="badge badge-brown">' . trans('common.passive') . '</label>'!!}</td>
                                    <td>{!!$record->is_active ? '<label class="badge badge-green">' . trans('common.active') . '</label>' : '<label class="badge badge-brown">' . trans('common.passive') . '</label>'!!}</td>
                                    <td>
                                        <div class="btn-group">
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('video_gallery.destroy',  $record))) !!}
                                                {!! link_to_route('add_multi_videos_view', trans('common.add_multi_videosView'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
                                                {!! link_to_route('video_gallery.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
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
                            <th>{{trans('video_gallery.title')}}</th>
                            <th>{{trans('video_gallery.is_cuff')}}</th>
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