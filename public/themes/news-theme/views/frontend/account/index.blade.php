@extends($activeTheme . '::frontend.master')

@section('content')
    <article class="container" id="container">
        <div class="row">
            <div class="col-md-8">
                <div class="title-section">
                    <h1><span>{{trans('account.management')}}</span></h1>
                </div>
                <div class="module">
                    <div class="account">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="account-img text-center">
                                    @if(!empty($record->id))
                                        <?php
                                        $default = Redis::get('url') . "/default_user_avatar.jpg";
                                        $size = 40;
                                        $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $record->email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
                                        ?>
                                        <img src="<?php echo $grav_url; ?>" alt="" class="img-rounded"/>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-left">
                                    <h2 class="account-name"><i class="fa fa-user"></i> {{$record->name}} </h2>
                                    <p><i class="fa fa-envelope"></i> <a href="mailto:{{$record->email}}">{{$record->email}}</a></p>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="text-center">
                                    <div class="btn-group">
                                        @permission('index-admin')
                                            <a href="{{route('dashboard')}}">
                                                <span>{{trans('dashboard.show_account_page')}}</span>
                                            </a>
                                        @endpermission

                                        {!! link_to_route('account.edit', trans('account.edit'), $record, ['class' => 'btn btn-primary'] ) !!}
                                        {!! link_to_route('change_password_view', trans('account.change_password'), $record, ['class' => 'btn btn-info'] ) !!}
                                        <br />
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.account -->
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <div class="title-section">
                    <h1><span>Sidebar</span></h1>
                </div>
                <div class="module">
                    sidebar
                </div>
            </div>
        </div>
    </article><!-- /.article -->
@endsection
@section('meta_tags')
    <title> {{ $record->name }}  </title>
@endsection