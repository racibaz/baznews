@extends($activeTheme .'::backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--Top header start-->
                <h3 class="ls-top-header">{{trans('article::article_setting.management')}}</h3>
                <!--Top header end -->

                <!--Top breadcrumb start -->
                <ol class="breadcrumb">
                    <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                    <li>
                        <a href="{!! URL::route('article_setting.index') !!}"> {{ trans('article::article_setting.article_categories') }} </a>
                    </li>
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

                    @if(isset($records->count()))
                        {!! Form::model($record, ['route' => ['article_setting.update', $records], 'method' => 'PATCH', 'files' => 'true']) !!}
                    @else
                        {!! Form::open(['route' => 'article_setting.store','method' => 'post', 'files' => 'true']) !!}
                    @endif

                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('article_count', trans('article::article_setting.article_count'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('article_count', $records->where('attribute_key','article_count')->first()->attribute_value, ['placeholder' => trans('article::article_setting.article_count') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('article_author_count', trans('article::article_setting.article_author_count'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('article_author_count', $records->where('attribute_key','article_author_count')->first()->attribute_value, ['placeholder' => trans('article::article_setting.article_author_count') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('recent_article_widget_list_count', trans('article::article_setting.recent_article_widget_list_count'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('recent_article_widget_list_count', $records->where('attribute_key','recent_article_widget_list_count')->first()->attribute_value, ['placeholder' => trans('article::article_setting.recent_article_widget_list_count') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('article_authors_widget_list_count', trans('article::article_setting.article_authors_widget_list_count'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('article_authors_widget_list_count', $records->where('attribute_key','article_authors_widget_list_count')->first()->attribute_value, ['placeholder' => trans('article::article_setting.article_authors_widget_list_count') ,'class' => 'form-control']) !!}
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

@section('css')
    <style>
        #preview {
            display: none;
        }

        .display {
            display: block !important;
        }
    </style>
@endsection

@push('js')

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                $("#preview").addClass("display");
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#icon").change(function () {
            readURL(this);
        });
    </script>
@endpush