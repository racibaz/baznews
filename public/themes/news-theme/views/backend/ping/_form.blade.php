@extends($activeTheme . '::backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!--Top header start-->
            <h3 class="ls-top-header">{{trans('ping.management')}}</h3>
            <!--Top header end -->

            <!--Top breadcrumb start -->
            <ol class="breadcrumb">
                <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                <li class="active"> {{ trans('common.update') }}</li>
            </ol>
            <!--Top breadcrumb start -->
        </div>
    </div>
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-light-blue">
                <div class="panel-heading">
                    {{--/<h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>--}}
                </div>

                {!! Form::open(['route' => 'ping.update','method' => 'post']) !!}
                    <div class="panel-body">

                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('ping_list', trans('ping.ping_list'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('ping_list', $record->ping_list, ['placeholder' => trans('ping.ping_list') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}

                <div>{{trans('ping.created_at')}} : {{$record->created_at}}</div>
                <div>{{trans('ping.last_updated')}} : {{$record->updated_at}}</div>
            </div>
        </div>
    </div><!-- end row -->
    <!-- Main Content Element  End-->
</div><!-- end container-fluid -->
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('ping','general_setting');
    </script>
@endsection