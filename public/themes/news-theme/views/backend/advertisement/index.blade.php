@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('advertisement.management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('advertisement.index') !!}"> {{trans('advertisement.management')}}</a></li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <p>
                <a href="{{ route('advertisement.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('advertisement.create') }}
                </a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('advertisement.advert_list')}}</strong></h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="countries" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('advertisement.name')}}</th>
                            <th>{{trans('advertisement.is_active')}}</th>
                            <th>{{trans('advertisement.edit_delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>{!! link_to_route('advertisement.show', $record->name , $record, [] ) !!}</td>
                                <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                <td>
                                    <div class="btn-group">
                                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('advertisement.destroy',  $record))) !!}

                                        {!! link_to_route('advertisement.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}


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
        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('advertisement.active_theme')}}: </b>{{$activeTheme}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{trans('advertisement.area_name')}}</th>
                            <th>{{trans('advertisement.type')}}</th>
                            <th>{{trans('advertisement.status')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($advertisementAreaNames as $advertisementAreaName)
                            <tr>
                                <td>{{$advertisementAreaName['areaName']}}</td>
                                <td>{{$advertisementAreaName['areaType']}}</td>
                                <td>
                                    @if(in_array($advertisementAreaName['areaName'] , $repo->advertisements()->pluck('name')->toArray()))
                                        <span class="badge bg-green"><i
                                                    class="fa fa-check"></i> {{trans('advertisement.added')}}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <div>
                <ul>

                </ul>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('advertisement', '');
    </script>
@endsection