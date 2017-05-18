@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('common.redis_list')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
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
                        <ul>
                            @foreach($redisKeys as $index => $redisKey)
                                <li><a href="{!! URL::route('flushCacheItem',['cacheName' => $redisKey]) !!}"> {{ trans('common.remove_cache') }} </a>
                                    {{ ++$index  . '-  ' .  $redisKey}}
                                </li> <br />
                            @endforeach
                        </ul>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" >
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{ trans('common.redis_no') }}</th>
                                    <th>{{ trans('common.redis_key') }}</th>
                                    <th>{{ trans('common.redis_remove') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($redisKeys as $index => $redisKey)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>{{$redisKey}}</td>
                                        <td><a href="{!! URL::route('removeCacheKey',['cacheName' => $redisKey]) !!}" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i>  {{ trans('common.redis_remove_cache') }} </a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                <button class="btn btn-primary"> <i class="fa fa-angle-down"></i> Daha Fazla Yükle</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div><!-- end row -->
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('setting','general_setting');
    </script>
@endsection
