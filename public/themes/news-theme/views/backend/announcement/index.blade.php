@extends($activeTheme. '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('announcement.management')}}
            <small>{{trans('announcement.announce_list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('announcement.index') !!}"> {{trans('announcement.management')}}</a></li>
            <li>{{trans('announcement.announce_list')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div style="margin-bottom: 20px;">
        <a href="{{ route('announcement.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> {{ trans('common.create') }}
        </a>
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-bullhorn"></i> {{trans('announcement.announce_list')}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
            <div class="table-responsive">
                <table id="announce" class="table table-bordered table-hover table-data">
                    <thead>
                    <tr>
                        <th>{!! trans('announcement.title') !!}</th>
                        <th>{!! trans('announcement.is_active') !!}</th>
                        <th>{!! trans('announcement.edit_delete') !!}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{!! link_to_route('announcement.show', $record->title, $record, [] ) !!}</td>
                            <td>
                                @if($record->is_active)
                                    <span class="badge bg-green">{{trans('announcement.active')}}</span>
                                @else
                                    <span class="badge bg-gray">{{trans('announcement.passive')}}</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('announcement.destroy',  $record))) !!}
                                    {!! link_to_route('announcement.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
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
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('announcement', '');
    </script>
@endsection