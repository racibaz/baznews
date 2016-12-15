@extends($activeTheme .'::backend.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" />
    <link href="//vjs.zencdn.net/5.8/video-js.min.css" rel="stylesheet">
@endsection

@section('content')
    <ul>
        @foreach($video_gallery->videos as $video)
                <li>
                    <img src="{{$video->file}}">
                </li>
        @endforeach

    <div class="row">
        <div class="col-md-6">
            <div id="gallery-videos">
                <ul>
                    {!! Form::open(['route' => 'updateGalleryVideos','method' => 'post']) !!}

                        @foreach($video_gallery->videos as $video)
                            <li>

                                <div class="form-group">
                                    <div class="row">
                                        {{trans('news::news.delete_video')}}
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <div class="checkbox i-checks">
                                                <label>
                                                    {!! Form::checkbox('delete/' . $video->id, null , null) !!}
                                                    <i></i> {{trans('news::news.delete_video')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if(!empty($video->file))
                                    <video id="{{$video->id}}"
                                        class="video-js vjs-default-skin"
                                        controls preload="auto" width="640" height="264"
                                        poster="http://video-js.zencoder.com/oceans-clip.png"
                                        data-setup='{"example_option":true}'>
                                        <source src="{{url($video->file)}}" type="video/mp4" />
                                        {{--<source src="http://video-js.zencoder.com/oceans-clip.webm" type="video/webm" />--}}
                                        {{--<source src="http://video-js.zencoder.com/oceans-clip.ogv" type="video/ogg" />--}}
                                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                    </video>
                                @elseif(!empty($video->link))
                                    <video
                                        id="{{$video->id}}"
                                        class="video-js vjs-default-skin"
                                        controls
                                        width="640" height="264"
                                        {{--data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{url($video->link)}}"}] }'--}}
                                        data-setup='{ "techOrder": ["vimeo"], "sources": [{ "type": "video/vimeo", "src": "{{url($video->link)}}"}] }'>
                                    </video>
                                @endif

                                {!! Form::text('subtitle/'. $video->id, $video->subtitle, ['placeholder' => trans('news::video_gallery.subtitle') ,'class' => 'form-control']) !!}
                                {!! Form::textarea('content/'. $video->id, $video->content, ['placeholder' => trans('news::video_gallery.subtitle') ,'class' => 'form-control']) !!}
                            </li>
                        @endforeach

                        <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('video.updateSubtitleAndContent')}}</button>

                    {!! Form::close() !!}
                </ul>
            </div>
        </div>
    </div><!-- end row -->


    {!! Form::open(['route' => 'addMultiVideos','method' => 'post', 'class' => 'dropzone', 'id' => 'addVideos', 'files' => 'true']) !!}

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

            maxFileSize: 2,
            acceptedFiles : 'video/*',
            success: function (file, response) {

                if(file.status == 'success'){
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