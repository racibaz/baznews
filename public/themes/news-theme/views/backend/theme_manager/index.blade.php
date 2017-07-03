@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('theme_manager.management')}}
            <small>{{trans('theme_manager.list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('theme_manager.index') !!}"> {{trans('theme_manager.management')}}</a></li>
            <li class="active">{{trans('theme_manager.list')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('theme_manager.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('theme_manager.create') }}
                </a>
            </div>
            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('theme_manager.themes')}}</strong></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        @foreach($themes as $theme)
                            <div class="col-md-3 col-lg-2">
                                <div class="thumbnail">
                                    <img src="{{ asset('themes/' . $theme . '/theme-thumb.png')}}" alt="">
                                    <div class="caption">
                                        <h3>{{$theme}}
                                            @if($activeTheme == $theme)
                                                <span class="badge bg-green"><i class="fa fa-check"></i>Aktif</span>
                                            @endif
                                        </h3>
                                        <p>
                                            {!! link_to_route('themeActivationToggle', ($activeTheme === $theme ? 'Etkisizleştir':'Etkinleştir') ,$theme, ['class'=>'btn'.($activeTheme === $theme ? ' btn-danger':' btn-success')] ) !!}
                                        </p>
                                    </div>
                                </div>
                            </div><!-- /.col -->
                        @endforeach
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title">
                        {{trans('theme_manager.list')}}
                    </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table id="modules" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('theme_manager.name')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>{!! link_to_route('theme_manager.show', $record->name , $record, [] ) !!}</td>
                                <td>{!!$record->is_active ? '<label class="badge badge-green">' . trans('common.active') . '</label>' : '<label class="badge badge-brown">' . trans('common.passive') . '</label>'!!}</td>
                                <td>
                                    <div class="btn-group">
                                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('theme_manager.destroy',  $record))) !!}

                                        {!! link_to_route('theme_manager.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}


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
        </div>
        <!-- /.col -->
    </div>


@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('theme_manager', '');
    </script>
@endsection