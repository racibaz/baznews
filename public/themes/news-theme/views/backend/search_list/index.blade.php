@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('search_list.management')}}
            <small>{{trans('common.list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('search_list.index') !!}">{{trans('search_list.management')}}</a></li>
            <li class="active">{{trans('search_list.list')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('search_list.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('common.create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('search_list.management')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table id="countries" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('search_list.module_slug')}}</th>
                            <th>{{trans('search_list.class_path')}}</th>
                            <th>{{trans('search_list.field')}}</th>
                            <th>{{trans('search_list.is_require_slug')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                            <th>{{trans('common.edit_delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>{!! link_to_route('search_list.show', $record->module_slug , $record, [] ) !!}</td>
                                <td>{{$record->class_path}}</td>
                                <td>{{$record->field}}</td>
                                <td>{!!$record->is_require_slug ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                <td>
                                    <div class="btn-group">
                                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('search_list.destroy',  $record))) !!}

                                        {!! link_to_route('search_list.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}


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
        activeMenu('search_list', 'general_setting');
    </script>
@endpush