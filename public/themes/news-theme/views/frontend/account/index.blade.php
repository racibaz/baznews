@extends($activeTheme . '::frontend.master')

@section('content')
    <article class="container" id="container">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><strong>{{trans('account.managment')}}</strong></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        @if(!empty($record->id))
                            <?php
                            $default = Redis::get('url') . "/default_user_avatar.jpg";
                            $size = 40;
                            $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $record->email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
                            ?>
                            <img src="<?php echo $grav_url; ?>" alt="" />
                        @endif

                        <br />

                        kullanıcı bilgileri...<br />
                        {{$record->name}}<br />
                        {{$record->email}}<br />

                        {!! link_to_route('account.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
                            <br />
                        {!! link_to_route('change_password_view', trans('account.change_password'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
                            <br />

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </article><!-- /.article -->
@endsection