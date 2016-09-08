@extends('default-theme::backend.master')

@section('content')

    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['page.update', $record], 'method' => 'PATCH']) !!}
    @else
        {!! Form::open(['route' => 'page.store','method' => 'post']) !!}
    @endif


    <!-- Main content -->

    <div class="row">
        <div class="col-md-12">
            <!--Top header start-->
            <h3 class="ls-top-header">{{trans('page.managment')}}</h3>
            <!--Top header end -->

            <!--Top breadcrumb start -->
            <ol class="breadcrumb">
                <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! URL::route('page.index') !!}"> {{ trans('page.pages') }} </a></li>
                <li class="active">{{trans('page.page_form')}}</li>
            </ol>
            <!--Top breadcrumb start -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-light-blue">
                <div class="panel-heading">
                    {{--<h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>--}}
                </div>

                @if(isset($record->id))
                    {!! Form::model($record, ['route' => ['page.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
                @else
                    {!! Form::open(['route' => 'page.store','method' => 'post', 'files' => 'true']) !!}
                @endif

                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('title', trans('page.title'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('title', $record->title, ['placeholder' => trans('page.title'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('slug', trans('page.slug'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('slug', $record->slug, ['placeholder' => trans('page.slug'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('content', trans('page.content'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('content', $record->content, ['placeholder' => trans('page.content'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('keywords', trans('page.keywords'), ['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('keywords', $record->keywords, ['placeholder' => trans('page.keywords'), 'class' => 'form-control']) !!}
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
                                        <i></i> {{trans('common.status')}}
                                    </label>
                                </div>
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
            </div>
    </div>
</div><!-- end row -->
    <!-- /.content -->

@endsection