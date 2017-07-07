@extends($activeTheme . '::backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--Top header start-->
                <h3 class="ls-top-header">{{trans('sitemap.management')}}</h3>
                <!--Top header end -->

                <!--Top breadcrumb start -->
                <ol class="breadcrumb">
                    <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                    <li><a href="{!! URL::route('sitemap.index') !!}"> {{ trans('sitemap.sitemaps') }} </a></li>
                    <li class="active"> {{ trans('common.add_update') }}</li>
                </ol>
                <!--Top breadcrumb start -->
            </div>
        </div>
        <!-- Main Content Element  Start-->
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-light-blue">
                    <div class="panel-heading">
                    </div>

                    @if(isset($record->id))
                        {!! Form::model($record, ['route' => ['sitemap.update', $record], 'method' => 'PATCH']) !!}
                    @else
                        {!! Form::open(['route' => 'sitemap.store','method' => 'post']) !!}
                    @endif

                    <div class="panel-body">


                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('name', trans('sitemap.name'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('name', $record->name, ['placeholder' => trans('sitemap.name') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('url', trans('sitemap.url'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('url', $record->url, ['placeholder' => trans('sitemap.url') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('order', trans('sitemap.order'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('order', $record->order, ['placeholder' => trans('sitemap.order') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                {{trans('common.status')}}
                                <div class="col-lg-offset-2 col-lg-10">
                                    <div class="checkbox i-checks">
                                        <label>
                                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                            <i></i> {{trans('common.is_active')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-success" type="submit"><i
                                                class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
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
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('sitemap', '');
    </script>
@endsection