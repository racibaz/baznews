@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('page.management')}}
            <small>{{trans('page.page_list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('page.index') !!}"> {{trans('page.management')}}</a></li>
            <li class="active">{{trans('page.page_list')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('page.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('page.page_create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{trans('page.management')}}</strong></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table id="countries" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('page.name')}}</th>
                            <th>{{trans('common.is_comment')}}</th>
                            <th>{{trans('page.is_active')}}</th>
                            <th>{{trans('page.edit_create')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>{!! link_to_route('page.show', $record->name , $record, [] ) !!}</td>
                                <td>{!!$record->is_comment ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                <td>
                                    <div class="btn-group">
                                        @if($record->is_active)
                                            {!! link_to_route('page', trans('common.show'), $record->slug, ['target' => '_blank', 'class' => 'btn btn-info btn-xs'] ) !!}
                                        @endif
                                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('page.destroy',  $record))) !!}
                                        {!! link_to_route('page.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
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
                            <th>{{trans('page.name')}}</th>
                            <th>{{trans('common.is_comment')}}</th>
                            <th>{{trans('page.is_active')}}</th>
                            <th>{{trans('page.edit_create')}}</th>
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
        activeMenu('page', '');
    </script>
@endpush