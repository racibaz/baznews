@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('announcement.management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('announcement.index') !!}"> {{trans('announcement.management')}}</a></li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-bullhorn"></i> <strong>Duyuru Listesi</strong></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="announcement_list" class="table table-bordered table-hover table-data">
                    <thead>
                    <tr>
                        <th>{!! trans('announcement.title') !!}</th>
                        <th>{!! trans('announcement.description') !!}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{$record->title}}</td>
                            <td>{{$record->description}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>{!! trans('announcement.title') !!}</th>
                        <th>{!! trans('announcement.description') !!}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('announcement', '');
    </script>
@endpush
