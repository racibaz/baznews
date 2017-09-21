@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('city.management')}}
            <small>{{trans('city.list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('city.index') !!}">{{trans('city.management')}}</a></li>
            <li class="active">{{trans('city.list')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('city.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('city.create') }}
                </a>
            </div>

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{trans('city.list')}}</strong></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table id="cities" class="table table-bordered table-hover table-data">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('city.name')}}</th>
                            <th>{{trans('city.is_active')}}</th>
                            <th>{{trans('city.edit_delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>{!! link_to_route('city.show', $record->name , $record, [] ) !!}</td>
                                <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                <td>
                                    <div class="btn-group">
                                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('city.destroy',  $record))) !!}

                                        {!! link_to_route('city.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
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
        activeMenu('city', 'general_setting');
    </script>
@endpush