@extends($activeTheme . '::backend.master')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('setting.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('common.create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('setting.managment')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('setting.attribute_key')}}</th>
                            <th>{{trans('setting.attribute_value')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('setting.show', $record->attribute_key , $record, [] ) !!}</td>
                                    <td> {{ $record->attribute_value  }} </td>
                                    <td>
                                        <div class="btn-group">
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('setting.destroy',  $record))) !!}
                                            {!! link_to_route('setting.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
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
                            <th>{{trans('setting.attribute_key')}}</th>
                            <th>{{trans('setting.attribute_value')}}</th>
                        </tr>
                        </tfoot>
                    </table>

                    <div>

                        <br /><br /><br />
                        <ul>
                            <li><a href="{!! route('repairMysqlTables') !!}"> <span>Mysql Tabloları Onar</span></a></li>
                            <li><a href="{!! route('getAllRedisKey') !!}"> <span>Cache Verileri Göster</span></a></li>
                            <li><a href="{!! route('flushAllCache') !!}"> <span>Cache Verilerini Sil</span></a></li>
                            <li><a href="{!! route('getBackUp') !!}"> <span>Backup Al</span></a></li>
                            <li><a href="{!! route('backUpClean') !!}"> <span>Backup ları Sil</span></a></li>
                            <li><a href="{!! route('viewClear') !!}"> <span>View Cache lerini Temizle</span></a></li>
                            <li><a href="{!! route('routeClear') !!}"> <span>Route Cache lerini Temizle</span></a></li>
                            <li><a href="{!! route('configClear') !!}"> <span>Konfigirasyon Ayarlarını lerini Temizle</span></a></li>
                            <li><a href="{!! route('configCache') !!}"> <span>Konfigirasyon Ayarlarını lerini Cache le</span></a></li>
                        </ul>
                        <br /><br />
                    </div>

                    <div>
                        <h1>activeTheme :</h1> {{$activeTheme}} <br>
                        <h1> themes : </h1>
                        @foreach($themes as $theme)
                            {{$theme}} <br />
                        @endforeach
<br><br><br><br><br>

                        <h1> modulesCount : </h1> {{$modulesCount}}
                        <br>
                        <h1> modules : </h1>
                        <br>
                        @foreach($modules as $module)
                            {{$module['basename']}} <br />
                        @endforeach

<br><br><br><br><br>
                    </div>

                    <h1> RoactiveTheme :utes </h1>
                    <div id="routes">
                        @foreach ($routeCollection as $value)
                            {{$value->getPath()}} <br />
                        @endforeach
                    </div>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection