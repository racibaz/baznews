@extends($activeTheme .'::backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--Top header start-->
                <h3 class="ls-top-header">{{trans('book::book_setting.management')}}</h3>
                <!--Top header end -->

                <!--Top breadcrumb start -->
                <ol class="breadcrumb">
                    <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                    <li><a href="{!! URL::route('book_setting.index') !!}"> {{ trans('book::book_setting.book_categories') }} </a></li>
                    <li class="active"> {{ trans('book::common.add_update') }}</li>
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
                    {!! Form::open(['route' => 'book_setting.store','method' => 'post']) !!}

                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('book_count', trans('book::book_setting.book_count'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('book_count', $records->where('attribute_key','book_count')->first()->attribute_value, ['placeholder' => trans('book::book_setting.book_count') ,'class' => 'form-control']) !!}
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
