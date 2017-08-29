@extends($activeTheme . '::frontend.master')

@section('content')
    <article class="container" id="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section">
                    <h1><span>{{trans('account.management')}}</span></h1>
                </div>
                <div class="module">
                    <div class="account">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="account-img text-center">
                                    @if(!empty($record->id))
                                        <img src="{{\App\Models\User::getUserAvatar(Auth::user()->email, 40)}}" alt="" class="img-rounded" width="40" height="40"/>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <h2 class="account-name"><i class="fa fa-user"></i> {{$record->name}} </h2>
                                    <p><i class="fa fa-envelope"></i> {{$record->email}}</p>
                                    @if(!empty($record->getUserLastLoginDiffHumansTime()))
                                        <p><i class="fa fa-sign-in" aria-hidden="true"></i>  : {{ $record->getUserLastLoginDiffHumansTime() }}</p>
                                    @endif
                                    @if(!empty($record->getUserPreviousLoginDiffHumansTime()))
                                        <p><i class="fa fa-sign-out" aria-hidden="true"></i>  : {{ $record->getUserPreviousLoginDiffHumansTime() }}</p>
                                    @endif
                                    {!! link_to_route('account.edit', trans('account.edit'), $record, ['class' => 'btn btn-primary'] ) !!}
                                    {!! link_to_route('change_password_view', trans('account.change_password'), $record, ['class' => 'btn btn-info'] ) !!}
                                </div>
                            </div>
                            <div class="col-md-5">
                                <p>
                                    @permission('index-admin')
                                    <a href="{{route('dashboard')}}" class="btn btn-success btn-block">
                                        <i class="fa fa-window-restore"></i> {{trans('account.show_dashboard')}}
                                    </a>
                                    @endpermission
                                </p>
                                <p>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                       class="btn btn-danger btn-block">
                                        <i class="fa fa-sign-out"></i>{{trans('account.logout')}}
                                    </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                </p>
                            </div>
                        </div>
                    </div><!-- /.account -->
                </div>
            </div>
            <!-- /.col -->
        </div>
    </article><!-- /.article -->
@endsection
@section('meta_tags')
    <title> {{ $record->name }}  </title>
@endsection