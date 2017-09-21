@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('country.management')}}
            <small>{{trans('country.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('country.index') !!}">{{trans('country.management')}}</a></li>
            <li class="active">{{trans('country.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['country.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'country.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('country.create_edit')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('name', trans('country.name'),['class'=> 'control-label']) !!}
                        {!! Form::text('name', $record->name, ['placeholder' => trans('country.name') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                            {{trans('common.is_active')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i
                                    class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                    </div>
                </div>
                <!-- /.box-body -->
            </div><!-- /.box .box-default -->
        </div>
    </div><!-- end row -->
    <!-- Main Content Element  End-->
    {!! Form::close() !!}
@endsection
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('country', 'general_setting');
    </script>
@endpush