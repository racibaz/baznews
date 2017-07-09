@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('book::book.management')}}
            <small>{{trans('book::book.list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('book.index') !!}">{{trans('book::book.management')}}</a></li>
            <li class="active">{{trans('book::book.list')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('book.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('book::book.create_book') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('book::book.management')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table id="books" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('book::book.name')}}</th>
                            <th>{{trans('book::book.short_url')}}</th>
                            <th>{{trans('common.is_comment')}}</th>
                            <th>{{trans('book::book.is_cuff')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                            <th>{{trans('common.edit_delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>{!! link_to_route('book.show', $record->name , $record, [] ) !!}</td>
                                <td> {{$record->short_url}} </td>
                                <td>{!!$record->is_comment ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                <td>{!!$record->is_cuff ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                <td>
                                    <div class="btn-group">
                                        {!! link_to_route('book', trans('common.show'), $record->slug, ['target' => '_blank', 'class' => 'btn btn-info btn-xs'] ) !!}
                                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('book.destroy',  $record))) !!}
                                        {!! link_to_route('book.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
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
        activeMenu('books', 'book_management');
    </script>
@endsection