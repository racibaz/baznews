@extends($activeTheme . '::frontend.master')

@section('content')

    <article class="container" id="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="title-section">
                    <h1>
                        <span>{{trans('contact.contact_form')}}</span>
                    </h1>
                </div>
                <div class="contact-form module">

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

                    {!! Form::open(['route' => 'contact-store','method' => 'post', 'files' => 'true']) !!}

                        {{Form::token()}}

                        <div class="form-group">
                            <label for="contact_type_id">{{trans('contact.contact_type_id')}}</label>
                            {!! Form::select('contact_type_id', $contactTypeList , null , ['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="full_name">{{trans('contact.full_name')}}</label>
                            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="{{trans('contact.full_name')}}...">
                        </div>

                        <div class="form-group">
                            <label for="mail">{{trans('contact.subject')}}</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="{{trans('contact.subject')}}...">
                        </div>

                        <div class="form-group">
                            <label for="mail">{{trans('contact.email')}}</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="{{trans('contact.email')}}...">
                        </div>

                        <div class="form-group">
                            <label for="phone">{{trans('contact.phone')}}</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="{{trans('contact.phone')}}...">
                        </div>

                        <div class="form-group">
                            <label for="content">{{trans('contact.content')}}</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">{{trans('contact.submit')}}</button>

                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-lg-5">
                <div class="title-section">
                    <h1>
                        <span>İletişim Bilgileri</span>
                    </h1>
                </div>
                <div class="contact-details module">
                    <address>
                        {!! Redis::get('contact') !!}
                    </address>
                </div>
                <div class="title-section">
                    <h1>
                        <span>Haritada Bulun</span>
                    </h1>
                </div>
                <div class="map module">
                    <div id="map" style="height: 300px;"></div>
                    <script>
                        var map;
                        function initMap() {
                            map = new google.maps.Map(document.getElementById('map'), {
                                center: {lat: {{Redis::get('latitude')}}, lng: {{Redis::get('longitude')}}},
                                zoom: 8
                            });
                        }
                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQyh_MHfabaWQcFxME6egd1zcMr2eIeCk&callback=initMap"
                            async defer></script>
                </div>
            </div>
        </div>
    </article><!-- /.article -->
@endsection


@section('meta_tags')
    <title> {{ Redis::get('title') }}  </title>
    <meta name="keywords" content="{{ Redis::get('keywords') }}"/>
    <meta name="description" content="{{ Redis::get('description') }}"/>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='category' content=''>
    <meta name='pagename' content='jQuery Tools, Tutorials and Resources - O Reilly Media'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>
@endsection
