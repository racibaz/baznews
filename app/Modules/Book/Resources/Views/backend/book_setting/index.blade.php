@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('book::book_setting.book_setting')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('book_setting.index') !!}">{{trans('book::book_setting.book_setting')}}</a></li>
        </ol>
    </section>
@endsection
@section('content')
    {!! Form::open(['route' => 'book_setting.store','method' => 'post']) !!}
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('book::book_setting.book_setting')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('book_count', trans('book::book_setting.book_count'),['class'=> 'control-label']) !!}
                        {!! Form::number('book_count', $records->where('attribute_key','book_count')->first()->attribute_value, ['placeholder' => trans('book::book_setting.book_count') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('book_settings','book_management');
    </script>
@endsection
