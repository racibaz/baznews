@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('permission.management')}}
            <small>{{trans('permission.list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('permission.index') !!}">{{trans('permission.management')}}</a></li>
            <li class="active">{{trans('permission.list')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <!-- Content Header (Page header) -->

    <div style="margin-bottom: 20px;">
        <a href="{{ route('permission.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> {{ trans('permission.create') }}
        </a>
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><strong>{{trans('permission.management')}}</strong></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                <table id="permissions" class="table table-bordered table-hover table-data">
                    <thead>
                    <tr>
                        <th>{!! trans('permission.name') !!}</th>
                        <th>{!! trans('permission.display_name') !!}</th>
                        <th>{!! trans('permission.description') !!}</th>
                        <th>{!! trans('permission.is_active') !!}</th>
                        <th>{!! trans('permission.edit_delete') !!}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>
                                {!! link_to_route('permission.show', $record->name, $record, [] ) !!}
                            </td>
                            <td>{{$record->display_name }}</td>
                            <td>{{$record->description }}</td>
                            <td>{!! $record->is_active ? '<span class="badge bg-green">'.trans('permission.active').'</span>':'<span class="badge bg-gray">'.trans('permission.passive').'</span>' !!}</td>
                            <td>
                                <div class="btn-group">
                                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('permission.destroy',  $record))) !!}
                                    {!! link_to_route('permission.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
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
@section('css')
    <link href="{{ Theme::asset($activeTheme .'::js/bootstrap-datatables/css/dataTables.bootstrap.css') }}"
          rel="stylesheet">
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme .'::js/datatables/js/jquery.dataTables.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme .'::js/bootstrap-datatables/js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript">
        //active menu
        activeMenu('permission', 'user_management');
        $('.table-data').DataTable({
            "sPaginationType": "full_numbers",
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "total": true,
            "language": {
                "decimal": "",
                "emptyTable": "Tabloda veri bulunamadı",
                "info": "_START_ ile _END_ arası _TOTAL_ kayıt gösteriliyor. Toplam Kayıt Sayısı: _TOTAL_",
                "infoEmpty": "_START_ ile _END_ arası _TOTAL_ kayıt gösteriliyor. Gösterilen Kayıt Sayısı: _TOTAL_",
                "infoFiltered": "(Toplam _MAX_ kayıt filtrelendi.)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "_MENU_ kayıt gösteriliyor.",
                "loadingRecords": "Yükleniyor...",
                "processing": "İşleniyor...",
                "search": "Ara:",
                "zeroRecords": "Hiçbir kayıt bulunamadı.",
                "paginate": {
                    "first": "İlk",
                    "last": "Son",
                    "next": "İleri",
                    "previous": "Geri"
                },
                "aria": {
                    "sortAscending": ": Artan sıralamaya göre listelendi",
                    "sortDescending": ": Azalan sıralamaya göre listelendi"
                }
            }
        });
    </script>
@endsection