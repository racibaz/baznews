@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('biography::biography.management')}}
            <small>{{trans('biography::biography.list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('biography.index') !!}">{{trans('biography::biography.management')}}</a></li>
            <li class="active">{{trans('biography::biography.list')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('biography.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('biography::biography.add_biography') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('biography::biography.list')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table id="biographies" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('biography::biography.name')}}</th>
                            <th>{{trans('biography::biography.short_url')}}</th>
                            <th>{{trans('biography::biography.order')}}</th>
                            <th>{{trans('biography::biography.status')}}</th>
                            <th>{{trans('biography::biography.is_cuff')}}</th>
                            <th>{{trans('biography::biography.is_active')}}</th>
                            <th>{{trans('biography::biography.edit_delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('biography.show', $record->name , $record, [] ) !!}</td>
                                    <td> {{$record->short_url}} </td>
                                    <td> {{$record->order}} </td>
                                    <td>{!!$record->status ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                    <td>{!!$record->cuff ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                    <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                    <td>
                                        <div class="btn-group">
                                            {!! link_to_route('biography', trans('common.show'), $record->slug, ['target' => '_blank', 'class' => 'btn btn-info btn-xs'] ) !!}
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('biography.destroy',  $record))) !!}

                                            {!! link_to_route('biography.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}

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
        activeMenu('biograpy_manager','');
    </script>
@endsection