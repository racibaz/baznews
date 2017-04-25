@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('ping.management')}}
            <small>{{trans('ping.send')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li class="active">{{trans('ping.send')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    {!! Form::open(['route' => 'ping.update','method' => 'post']) !!}
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-8 col-lg-6">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('ping.send')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: block;">
                    <span><b>{{trans('ping.created_at')}}</b> : {{$record->created_at}}</span>-
                    <span><b>{{trans('ping.last_updated')}}</b> : {{$record->updated_at}}</span>

                    <div class="form-group">
                        {!! Form::label('ping_list', trans('ping.description'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('ping_list', $record->ping_list, ['placeholder' => trans('ping.description') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('ping.send')}}</button>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div><!-- end row -->
    {!! Form::close() !!}
    <!-- Main Content Element  End-->
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('ping','general_setting');
    </script>
@endsection