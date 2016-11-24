@extends($activeTheme . '::frontend.master')

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--Top header start-->
                <h3 class="ls-top-header">{{trans('future_news::future_news.managment')}}</h3>
                <!--Top header end -->

                <!--Top breadcrumb start -->
                <ol class="breadcrumb">
                    <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                    <li><a href="{!! URL::route('future_news.index') !!}"> {{ trans('future_news::future_news.future_news_list') }} </a></li>
                    <li class="active"> {{ trans('future_news::common.add_update') }}</li>
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
                    {!! Form::open(['route' => 'archive','method' => 'get']) !!}

                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        {!! Form::label('datetime', trans('news::archive.datetime'),['class'=> 'col-lg-2 control-label']) !!}

                                        <div class="col-lg-10">
                                            {!! Form::text('datetime', null , ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.search')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div><!-- end row -->
        <!-- Main Content Element  End-->
    </div><!-- end container-fluid -->

@endsection