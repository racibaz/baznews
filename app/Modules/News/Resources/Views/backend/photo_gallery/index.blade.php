@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::photo_gallery.management')}}
            <small>{{trans('common.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('photo_gallery.index') !!}">{{trans('news::photo_gallery.management')}}</a></li>
            <li class="active">{{trans('common.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                @if(Auth::user()->can('create-photogallery'))
                    <a href="{{ route('photo_gallery.create') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> {{ trans('news::photo_gallery.create') }}
                    </a>
                @endif
                @if(Auth::user()->can('forgetCache-photogallery'))
                    <a href="{{ route('removeCacheTags', ['cacheTags' => 'PhotoGalleryController']) }}" class="btn btn-info">
                        <i class="fa fa-trash-o"></i> {{ trans('news::photo_gallery.forget_photo_gallery_cache') }}
                    </a>
                @endif
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('news::photo_gallery.management')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table id="photo_galleries" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('common.title')}}</th>
                            <th>{{trans('news::photo_gallery.short_url')}}</th>
                            <th>{{trans('common.thumbnail')}}</th>
                            <th>{{trans('news::photo_gallery.is_cuff')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                            <th>{{trans('common.edit_delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('photo_gallery.show', $record->title , $record, [] ) !!}</td>
                                    <td>{{$record->short_url}}</td>
                                    <td>
                                        <img src="{{ asset('gallery/' . $record->id . '/photos/58x58_' . $record->thumbnail)}}"/>
                                    </td>
                                    <td>{!!$record->is_cuff ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                    <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                    <td>
                                        <div class="btn-group">
                                            @if($record->is_active)
                                                {!! link_to_route('show_photo_gallery', trans('common.show'), $record->slug, ['target' => '_blank', 'class' => 'btn btn-info btn-xs'] ) !!}
                                            @endif
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('photo_gallery.destroy',  $record))) !!}
                                            {!! link_to_route('add_multi_photos_view', trans('news::photo_gallery.add_multi_photosView'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
                                            {!! link_to_route('photo_gallery.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
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
        </div>
        <!-- /.col -->
    </div>
@endsection
@push('js')
    <script>
        //active menu
        activeMenu('photo_gallery', 'news_management');
    </script>
@endpush