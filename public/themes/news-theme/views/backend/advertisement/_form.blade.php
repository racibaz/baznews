@extends($activeTheme . '::backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!--Top header start-->
            <h3 class="ls-top-header">{{trans('advertisement.managment')}}</h3>
            <!--Top header end -->

            <!--Top breadcrumb start -->
            <ol class="breadcrumb">
                <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! URL::route('advertisement.index') !!}"> {{ trans('advertisement.advertisements') }} </a></li>
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
                    {{--/<h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>--}}
                </div>

                @if(isset($record->id))
                    {!! Form::model($record, ['route' => ['advertisement.update', $record], 'method' => 'PATCH']) !!}
                @else
                    {!! Form::open(['route' => 'advertisement.store','method' => 'post']) !!}
                @endif

                <div class="panel-body">

                    <ul>
                        @foreach($advertisementAreaNames as $advertisementAreaName)
                            <li>
                                {{$advertisementAreaName['areaName']}} -- {{$advertisementAreaName['areaType']}}
                            </li>
                        @endforeach
                    </ul>


                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('name', trans('advertisement.name'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('name', $record->name, ['placeholder' => trans('advertisement.name') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('code', trans('advertisement.code'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('code', $record->code, ['placeholder' => trans('advertisement.code') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('description', trans('advertisement.description'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('description', $record->description, ['placeholder' => trans('advertisement.description') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('photo', trans('advertisement.photo'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::file('photo') !!}
                                <img id="preview" src="#" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('link', trans('advertisement.link'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::url('link', $record->link, ['placeholder' => trans('advertisement.link') ,'class' => 'form-control']) !!}
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
                                <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
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

@section('css')
    <style>
        #preview {display: none;}
        .display {display: block !important;}
    </style>
@endsection

@section('js')

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                $( "#preview" ).addClass( "display" );
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#photo").change(function(){
            readURL(this);
        });
    </script>
@endsection