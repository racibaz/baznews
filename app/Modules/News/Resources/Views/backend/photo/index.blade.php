@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::photo.management')}}
            <small>{{trans('news::photo.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('news.index') !!}">{{trans('news::news.management')}}</a></li>
            <li class="active">{{trans('news::photo.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('photo.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('news::photo.create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('news::photo.management')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table id="photos" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('news::photo.name')}}</th>
                            <th>{{trans('news::photo.photo')}}</th>
                            <th>{{trans('news::photo.is_active')}}</th>
                            <th>{{trans('news::photo.edit_delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>{!! link_to_route('photo.show', $record->name , $record, [] ) !!}</td>
                                <td>
                                    @if($record->file)
                                        <img src="{{ asset('photos/' . $record->id . '/58x58_' . $record->file)}}" width="58" height="58"/>
                                    @elseif($record->link)
                                        <img src="{{ $record->link}}" width="58" height="58"/>
                                    @endif
                                </td>
                                <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                <td>
                                    <div class="btn-group">
                                        @if($record->is_active)
                                            {!! link_to_route('show_photo', trans('common.show'), $record->slug, ['target' => '_blank', 'class' => 'btn btn-info btn-xs'] ) !!}
                                        @endif
                                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('photo.destroy',  $record))) !!}

                                        {!! link_to_route('photo.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}

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
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('photo', 'news_management');
    </script>
@endsection