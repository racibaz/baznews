@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('common.redis_list')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('setting.index') !!}"> {{trans('setting.general')}}</a></li>
            <li class="active">{{trans('common.redis_list')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-light-blue">
                <div class="panel-heading">
                    {{--<h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>--}}
                </div>

                <div class="panel-body">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <ul>
                        @foreach($redisKeys as $index => $redisKey)
                            <li>
                                <a href="{!! URL::route('flushCacheItem',['cacheName' => $redisKey]) !!}"> {{ trans('common.remove_cache') }} </a>
                                {{ ++$index  . '-  ' .  $redisKey}}
                            </li> <br/>
                        @endforeach
                    </ul>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
            </div>
        </div><!-- end row -->
        @endsection
        @push('js')
            <script type="text/javascript">
                //active menu
                activeMenu('setting', 'general_setting');
            </script>
@endpush
