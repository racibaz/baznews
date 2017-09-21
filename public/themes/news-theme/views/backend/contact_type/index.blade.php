@extends($activeTheme . '::backend.master')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('contact_type.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('common.create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('contact_type.management')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table id="contact_types" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('contact_type.name')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                            <th>{{trans('contact_type.edit_create')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>{!! link_to_route('contact_type.show', $record->name , $record, [] ) !!}</td>
                                <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-red">' . trans('common.passive') . '</label>'!!}</td>
                                <td>
                                    <div class="btn-group">
                                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('contact_type.destroy',  $record))) !!}

                                        {!! link_to_route('contact_type.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}


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
                            <th>{{trans('contact_type.name')}}</th>
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
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('contact_type', '');
    </script>
@endpush