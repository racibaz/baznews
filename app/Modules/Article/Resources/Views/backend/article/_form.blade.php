@extends($activeTheme .'::backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!--Top header start-->
            <h3 class="ls-top-header">{{trans('news::article.managment')}}</h3>
            <!--Top header end -->

            <!--Top breadcrumb start -->
            <ol class="breadcrumb">
                <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! URL::route('article.index') !!}"> {{ trans('news::article.news_categories') }} </a></li>
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
                    {!! Form::model($record, ['route' => ['article.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
                @else
                    {!! Form::open(['route' => 'article.store','method' => 'post', 'files' => 'true']) !!}
                @endif

                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('author_id', trans('news::article.author_id'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::select('author_id', $authorList , $record->author_id , ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('title', trans('news::article.title'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('title', $record->title, ['placeholder' => trans('news::article.title') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('slug', trans('news::article.slug'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('slug', $record->slug, ['placeholder' => trans('news::article.slug') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('subtitle', trans('news::article.subtitle'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('subtitle', $record->subtitle, ['placeholder' => trans('news::article.subtitle') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('spot', trans('news::article.spot'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('spot', $record->spot, ['placeholder' => trans('news::article.spot') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('spot', trans('news::article.spot'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('spot', $record->cv, ['placeholder' => trans('news::article.spot') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('description', trans('news::article.description'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('description', $record->description, ['placeholder' => trans('news::article.description') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('keywords', trans('news::article.keywords'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('keywords', $record->keywords, ['placeholder' => trans('news::article.keywords') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('hit', trans('news::article.hit'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::number('hit', $record->hit, ['placeholder' => trans('news::article.hit') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('order', trans('news::article.order'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::number('order', $record->order, ['placeholder' => trans('news::article.order') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('status', trans('news::article.status'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::number('status', $record->status, ['placeholder' => trans('news::article.status') ,'class' => 'form-control']) !!}
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