@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::future_news.management')}}
            <small>{{trans('news::future_news.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('future_news.index') !!}">{{trans('news::future_news.management')}}</a></li>
            <li class="active">{{trans('news::future_news.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('future_news.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('news::future_news.news_create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('news::future_news.list')}}</strong></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                        <table id="future_news" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('news::future_news.news_title')}}</th>
                                <th>{{trans('news::future_news.status')}}</th>
                                <th>{{trans('news::future_news.future_datetime')}}</th>
                                <th>{{trans('news::future_news.is_active')}}</th>
                                <th>{{trans('news::future_news.edit_create')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('future_news.show', $record->news->title , $record, [] ) !!}</td>
                                    <td>{!! $record->news->status ? '<span class="badge bg-green">'.trans('news::future_news.news_live').'</span>':'<span class="badge bg-brown">'.trans('news::future_news.news_not_live').'</span>' !!} </td>
                                    <td>{{$record->future_datetime}} </td>
                                    <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('news::future_news.active') . '</label>' : '<label class="badge bg-brown">' . trans('news::future_news.passive') . '</label>'!!}</td>
                                    <td>
                                        <div class="btn-group">
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('future_news.destroy',  $record))) !!}

                                            {!! link_to_route('future_news.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}

                                            {!! Form::submit('Sil', ['class' => 'btn btn-danger btn-xs','data-toggle'=>'confirmation']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
        activeMenu('news_management','future_news');
    </script>
@endsection