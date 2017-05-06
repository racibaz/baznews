@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::video_gallery.management')}}
            <small>{{trans('news::video_gallery.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('video_gallery.index') !!}">{{trans('news::video_gallery.management')}}</a></li>
            <li class="active">{{trans('news::video_gallery.create_edit')}}</li>
        </ol>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" />
    <link href="//vjs.zencdn.net/5.8/video-js.min.css" rel="stylesheet">
@endsection

@section('content')

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{{trans('news::video_gallery.videos')}}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                @foreach($video_gallery->videos as $video)
                <div class="col-lg-4">
                    <div class="video-container" style="background-color: #000;margin-bottom: 15px;">
                        <video width="100%" height="240" controls style="display: table-cell;">
                            <source src="{{asset('video_gallery/' . $video_gallery->id . '/videos/' . $video->file)}}" type="video/mp4">
                        </video>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{{trans('news::video_gallery.videos')}}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route' => 'updateGalleryVideos','method' => 'post', 'files' => 'true']) !!}
            <div class="row">
                @foreach($video_gallery->videos as $video)
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="thumbnail">
                        <a data-toggle="modal" href="#modal-{{$video->id}}">
                            <div class="thumbnail-img">
                                <img src="{{ asset('video_gallery/' . $video_gallery->id . '/photos/213x116_' . $video->thumbnail)}}" width="100%" />
                            </div>
                        </a>
                        <div class="caption">
                            <p>
                                {!! Form::file('thumbnail/'. $video->id) !!}
                            </p>
                            <p>
                                <label>
                                    {!! Form::checkbox('delete/' . $video->id, null , null) !!}
                                    {{trans('news::video_gallery.delete_video')}}
                                </label>
                            </p>
                            <p>
                                <div class="form-group">
                                    {!! Form::text('subtitle/'. $video->id, $video->subtitle, ['placeholder' => trans('news::video.subtitle') ,'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::textarea('content/'. $video->id, $video->content, ['placeholder' => trans('news::video.content') ,'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::number('order/'. $video->id, $video->order, ['placeholder' => trans('news::video.order') ,'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('link/'. $video->id, $video->link, ['placeholder' => trans('news::video.link') ,'class' => 'form-control']) !!}
                                </div>
                            </p>
                            <p>
                                <label>
                                    {!! Form::checkbox('is_comment/' . $video->id, null , $video->is_comment) !!}
                                    <i></i> {{trans('news::video_gallery.is_comment')}}
                                </label>
                            </p>
                            <p>
                                <label>
                                    {!! Form::checkbox('is_active/' . $video->id, null , $video->is_active) !!}
                                    <i></i> {{trans('common.is_active')}}
                                </label>
                            </p>
                            <p>

                            </p>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-{{$video->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title">{{$video->name}}</h4>
                                </div>
                                <div class="modal-body">
                                    @if(!empty($video->file))
                                        <video id="{{$video->id}}"
                                               class="video-js vjs-default-skin"
                                               controls preload="auto" width="570" height="264"
                                               poster="{{ asset('video_gallery/' . $video_gallery->id . '/photos/213x116_' . $video->thumbnail)}}"
                                               data-setup='{"example_option":true}'>


                                            <source src="{{asset('video_gallery/' . $video_gallery->id . '/videos/' . $video->file)}}" type="video/mp4" />
                                            <source src="{{asset('video_gallery/' . $video_gallery->id . '/videos/' . $video->file)}}" type="video/webm" />
                                            {{--<source src="http://video-js.zencoder.com/oceans-clip.ogv" type="video/ogg" />--}}
                                            <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                        </video>
                                    @elseif(!empty($video->link))

                                        {!! $video->link !!}

                                        {{--<video--}}
                                        {{--id="{{$video->id}}"--}}
                                        {{--class="video-js vjs-default-skin"--}}
                                        {{--controls--}}
                                        {{--width="640" height="264"--}}
                                        {{--data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{url($video->link)}}"}] }'>--}}
                                        {{--data-setup='{ "techOrder": ["vimeo"], "sources": [{ "type": "video/vimeo", "src": "{{url($video->link)}}"}] }'--}}
                                        {{--</video>--}}
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
                @endforeach
            </div><!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('news::video_gallery.updateSubtitleAndContent')}}</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    {!! Form::open(['route' => 'addMultiVideos','method' => 'post', 'class' => 'dropzone', 'id' => 'addVideos', 'files' => 'true','enctype' => 'multipart/form-data']) !!}

        {{ csrf_field() }}

        {!! Form::hidden('video_gallery_id', $video_gallery->id) !!}
    {!! Form::close() !!}

@endsection


@section('js')

    <script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-youtube/2.1.1/Youtube.min.js"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/videojs/Vimeo.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

    <script>
        Dropzone.options.addVideos = {

            maxFileSize: 120,
            acceptedFiles : 'video/*',
            success: function (file, response) {

                if(file.status === 'success'){
                    handleDropzoneFileUpload.handleSuccess(response);
                }else {
                    handleDropzoneFileUpload.handleError(response);
                }
            }
        };


        var handleDropzoneFileUpload = {

            handleError: function (response) {
                console.log(response);
            },
            handleSuccess: function (response) {

                var $videoList = $('#gallery-videos ul');
                var videoSrc = baseUrl + '/' + response.file;
                $($videoList).append('<li> <a href="' + videoSrc + '"><img src="' + $videoSrc + '"></a></li>');
            }
        };

    </script>

@endsection