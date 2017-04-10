@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('page.management')}}
            <small>{{trans('page.edit_create')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('page.index') !!}"> {{trans('page.management')}}</a></li>
            <li class="active">{{trans('page.edit_create')}}</li>
        </ol>
    </section>
@endsection
@section('content')



    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->name}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: block;">
                    {{trans('page.name')}}
                    {{trans('page.slug')}}
                    {{trans('page.content')}}
                    {{trans('page.keywords')}}
                    {{trans('page.description')}}
                </div>
                <!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col-md-6 -->
        <div class="col-md-6">
            {{var_dump($record)}}
        </div>

    </div>

@endsection

