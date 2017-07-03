@extends($activeTheme . '::frontend.master')

@section('content')

    <article class="container" id="container">
        <div class="row">
            <div class="col-lg-7" id="content">
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

                    {!! Form::open(['route' => 'contact-store','method' => 'post']) !!}
                    {{Form::token()}}

                    <div class="form-group">
                        <label for="contact_type_id">{{trans('contact.contact_type_id')}}</label>
                        {!! Form::select('contact_type_id', $contactTypeList , null , ['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="full_name">{{trans('contact.full_name')}}</label>
                        <input type="text" class="form-control" name="full_name" id="full_name"
                               placeholder="{{trans('contact.full_name')}}...">
                    </div>

                    <div class="form-group">
                        <label for="mail">{{trans('contact.subject')}}</label>
                        <input type="text" class="form-control" name="subject" id="subject"
                               placeholder="{{trans('contact.subject')}}...">
                    </div>

                    <div class="form-group">
                        <label for="mail">{{trans('contact.email')}}</label>
                        <input type="text" class="form-control" name="email" id="email"
                               placeholder="{{trans('contact.email')}}...">
                    </div>

                    <div class="form-group">
                        <label for="phone">{{trans('contact.phone')}}</label>
                        <input type="text" class="form-control" name="phone" id="phone"
                               placeholder="{{trans('contact.phone')}}...">
                    </div>

                    <div class="form-group">
                        <label for="content">{{trans('contact.content')}}</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="g-recaptcha"
                         data-sitekey="{{Cache::tags('Setting')->get('google_recaptcha_site_key')}}"></div>

                    <button type="submit" class="btn btn-primary">{{trans('contact.submit')}}</button>

                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-lg-5" id="sidebar">
                <div class="title-section">
                    <h1>
                        <span>İletişim Bilgileri</span>
                    </h1>
                </div>
                <div class="contact-details module">
                    <address>
                        {!! Cache::tags('Setting')->get('contact') !!}
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
                                center: {
                                    lat: {{Cache::tags('Setting')->get('latitude')}},
                                    lng: {{Cache::tags('Setting')->get('longitude')}}},
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
    <title> {{ Cache::tags('Setting')->get('title') }}  </title>
    <meta name="keywords" content="{{ Cache::tags('Setting')->get('keywords') }}"/>
    <meta name="description" content="{{ Cache::tags('Setting')->get('description') }}"/>
    <meta name='pagename' content='jQuery Tools, Tutorials and Resources - O Reilly Media'>
@endsection
@section('js')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script>
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
    </script>
@endsection