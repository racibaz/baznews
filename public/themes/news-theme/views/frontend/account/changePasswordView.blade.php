@extends($activeTheme . '::frontend.master')

@section('content')
    <article class="container" id="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-light-blue">
                        <div class="panel-heading">
                            {{--<h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>--}}
                        </div>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('success_messages'))
                            <div class="alert alert-success">
                                {{ Session::get('success_messages') }}
                            </div>
                        @endif
                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
                        @if(Session::has('error_message'))
                            <div class="alert alert-danger">
                                {{ Session::get('error_message') }}
                            </div>
                        @endif

                        {!! Form::model($record, ['route' => ['change_password', $record], 'method' => 'POST']) !!}
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        {!! Form::label('password', trans('user.password'), ['class'=> 'col-lg-2 control-label']) !!}

                                        <div class="col-lg-10">
                                            {!! Form::password('password', array('placeholder' => trans('user.password'), 'class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        {!! Form::label('password_confirmation', trans('user.password_confirmation') ,['class'=> 'col-lg-2 control-label']) !!}

                                        <div class="col-lg-10">
                                            {!! Form::password('password_confirmation', array('placeholder' => trans('user.password_confirmation'), 'class'=>'form-control')) !!}
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
    </article><!-- /.article -->
@endsection