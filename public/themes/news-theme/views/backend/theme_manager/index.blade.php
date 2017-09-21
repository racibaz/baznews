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
                {{--<a href="{{ route('theme_manager.create') }}" class="btn btn-success">--}}
                    {{--<i class="fa fa-plus"></i> {{ trans('theme_manager.create') }}--}}
                {{--</a>--}}
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
                                    <img src="{{ asset('themes/' . $theme['slug'] . '/theme-thumb.png')}}" alt="">
                                    <div class="caption">
                                        <h3>{{$theme['slug']}}
                                            @if($activeTheme == $theme['slug'])
                                                <span class="badge bg-green"><i class="fa fa-check"></i>Aktif</span>
                                            @endif
                                        </h3>
                                        <p>
                                            {!! link_to_route('themeActivationToggle', ($activeTheme === $theme['slug'] ? 'Etkisizleştir':'Etkinleştir') ,$theme['slug'], ['class'=>'btn'.($activeTheme === $theme['slug'] ? ' btn-danger':' btn-success')] ) !!}
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
        </div>
        <!-- /.col -->
    </div>


@endsection
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('theme_manager', '');
    </script>
@endpush