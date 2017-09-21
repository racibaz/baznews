@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('contact.management')}}
            <small>{{trans('contact.edit_create')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('contact.index') !!}"> {{trans('contact.management')}}</a></li>
            <li class="active">{{trans('contact.edit_create')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['contact.update', $record], 'method' => 'PATCH']) !!}
    @else
        {!! Form::open(['route' => 'contact.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('contact.contact_form')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('contact_type_id', trans('contact.contact_type_id'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::select('contact_type_id', $contactTypeList , $record->contact_type_id , ['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('full_name', trans('contact.full_name'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('full_name', $record->full_name, ['placeholder' => trans('contact.full_name') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('subject', trans('contact.subject'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('subject', $record->subject, ['placeholder' => trans('contact.subject') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('content', trans('contact.content'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('content', $record->content, ['placeholder' => trans('contact.content') ,'class' => 'form-control summernote']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('email', trans('contact.email'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('email', $record->email, ['placeholder' => trans('contact.email') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('phone', trans('contact.phone'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('phone', $record->phone, ['placeholder' => trans('contact.phone') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <strong>
                                        {{trans('common.status')}}
                                    </strong>
                                </div>
                                <div class="col-lg-10">
                                    <label>
                                        {!! Form::checkbox('is_read', null , $record->is_read) !!}
                                        &nbsp;&nbsp;{{trans('contact.is_read')}}
                                    </label>
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
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div><!-- end row -->
    <!-- Main Content Element  End-->
    {!! Form::close() !!}
@endsection
@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/ckeditor/ckeditor.js') }}"></script>
    <script>
        //CKEDİTOR START
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
            language: 'tr'
        };
        CKEDITOR.replace('content', options);
        //CKEDİTOR END...

        //active menu
        activeMenu('', 'contact_management');
    </script>
@endpush