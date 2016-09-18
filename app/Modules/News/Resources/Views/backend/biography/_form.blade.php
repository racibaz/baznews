@extends($activeTheme .'::backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!--Top header start-->
            <h3 class="ls-top-header">{{trans('news::biography.managment')}}</h3>
            <!--Top header end -->

            <!--Top breadcrumb start -->
            <ol class="breadcrumb">
                <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! URL::route('biography.index') !!}"> {{ trans('news::biography.news_categories') }} </a></li>
                <li class="active"> {{ trans('news::common.add_update') }}</li>
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
                    {!! Form::model($record, ['route' => ['biography.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
                @else
                    {!! Form::open(['route' => 'biography.store','method' => 'post', 'files' => 'true']) !!}
                @endif

                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('full_name', trans('news::biography.full_name'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('full_name', $record->full_name, ['placeholder' => trans('news::biography.full_name') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('slug', trans('news::biography.slug'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('slug', $record->slug, ['placeholder' => trans('news::biography.slug') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('content', trans('news::biography.content'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('content', $record->content, ['placeholder' => trans('news::biography.content') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('photo', trans('news::biography.photo'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::file('photo') !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('description', trans('news::biography.description'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('description', $record->description, ['placeholder' => trans('news::biography.description') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('keywords', trans('news::biography.keywords'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('keywords', $record->keywords, ['placeholder' => trans('news::biography.keywords') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('order', trans('news::biography.order'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::number('order', $record->order, ['placeholder' => trans('news::biography.order') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('hit', trans('news::biography.hit'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::number('hit', $record->hit, ['placeholder' => trans('news::biography.hit') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::common.status')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                                        <i></i> {{trans('news::common.is_cuff')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('news::common.status')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                        <i></i> {{trans('news::common.is_active')}}
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