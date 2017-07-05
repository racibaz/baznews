@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::news.management')}}
            <small>{{$record->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('news.index') !!}">{{trans('news::news.management')}}</a></li>
            <li class="active">{{$record->title}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-7">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-globe"></i>

                    <h3 class="box-title">{{$record->title}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! $record->spot !!}
                </div>
                <!-- /.box-body -->
            </div>

            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-globe"></i>

                    <h3 class="box-title">{{trans('news::news.content')}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! $record->content !!}
                </div>
                <!-- /.box-body -->
            </div>

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::news.other_content')}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th width="20%">{{trans('news::news.small_title')}}</th>
                                <td>{{$record->small_title}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.slug')}}</th>
                                <td>{{$record->slug}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.short_url')}}</th>
                                <td>{{$record->short_url}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.description')}}</th>
                                <td>{{$record->description}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.keywords')}}</th>
                                <td>{{$record->keywords}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.meta_tags')}}</th>
                                <td>{{$record->meta_tags}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
        <div class="col-lg-5">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::news.other_settings')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th width="20%">{{trans('news::news.country_id')}}</th>
                                <td>{{$record->country->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.city_id')}}</th>
                                <td>{{$record->city->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.news_source_id')}}</th>
                                <td>{{$record->news_source->name}}</td>
                            </tr>

                            <tr>
                                <th>{{trans('news::news.cuff_photo')}}</th>
                                <td>{!!$record->cuff_photo ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.thumbnail')}}</th>
                                <td>
                                    <img src="{{ asset('images/news_images/' . $record->id . '/thumbnail/' . $record->thumbnail)}}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.cuff_photo')}}</th>
                                <td>
                                    <img src="{{ asset('images/news_images/' . $record->id . '/cuff_photo/' . $record->cuff_photo)}}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.cuff_direct_link')}}</th>
                                <td>{{$record->cuff_direct_link}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.video_embed')}}</th>
                                <td>{!! $record->video_embed !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.news_type')}}</th>
                                <td>{{$record->news_type}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.status')}}</th>
                                <td>{!! $record->status ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-warning"><i class="fa fa-times"></i></span></span>' !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.band_news')}}</th>
                                <td>{!! $record->band_news ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-warning"><i class="fa fa-times"></i></span></span>' !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.box_cuff')}}</th>
                                <td>{!! $record->box_cuff ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-warning"><i class="fa fa-times"></i></span></span>' !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.is_cuff')}}</th>
                                <td>{!! $record->is_cuff ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-warning"><i class="fa fa-times"></i></span></span>' !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.break_news')}}</th>
                                <td>{!! $record->break_news ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-warning"><i class="fa fa-times"></i></span></span>' !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.main_cuff')}}</th>
                                <td>{!! $record->main_cuff ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-warning"><i class="fa fa-times"></i></span></span>' !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.mini_cuff')}}</th>
                                <td>{!! $record->mini_cuff ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-warning"><i class="fa fa-times"></i></span></span>' !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.is_comment')}}</th>
                                <td>{!! $record->is_comment ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-warning"><i class="fa fa-times"></i></span></span>' !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.is_show_editor_profile')}}</th>
                                <td>{!! $record->is_show_editor_profile ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-warning"><i class="fa fa-times"></i></span></span>' !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.is_show_previous_and_next_news')}}</th>
                                <td>{!! $record->is_show_previous_and_next_news ? '<span class="badge bg-green"><i class="fa fa-check"></i></span>':'<span class="badge bg-warning"><i class="fa fa-times"></i></span></span>' !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.is_active')}}</th>
                                <td>{!! $record->is_active ? '<span class="badge bg-green">'.trans('news::news.active').'</span>':'<span class="badge bg-warning">'.trans('news::news.passive').'</span>'!!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->


                @if($relatedNewsItems)
                    <div class="relation-news">
                        <div class="title-section">
                            <h1>
                                <span>İlişkili Haberler</span>
                            </h1>
                        </div>
                        <div class="relation-news-body module">
                            <div class="row">
                                @foreach($relatedNewsItems as $relatedNews)
                                    <div class="col-lg-3">
                                        <div class="relation-news-image">
                                            <a href="#">
                                                <img src="{{asset('images/news_images/1/196x150_1.jpg')}}">
                                                <div class="relation-news-title">
                                                    {{$relatedNews->title}}
                                                </div>
                                            </a>
                                        </div>
                                    </div><!-- /.col -->
                                @endforeach
                            </div>
                        </div>
                    </div><!-- /.relation-news -->
                @endif
                @if($record->video_galleries->count())
                    <div class="news-video-gallery">
                        <div class="title-section">
                            <h1>
                                <span>Haberin Video Galerileri</span>
                            </h1>
                        </div>
                        <div class="news-video-body module">
                            <div class="row">
                                @foreach($record->video_galleries as $video_gallery)
                                    <div class="col-lg-3">
                                        <div class="news-video-image">
                                            <a href="#">
                                                <span class="play-icon"></span>
                                                <a href="{{route('show_videos',['slug' => $video_gallery->videos->first()->slug ])}}">
                                                    <img src="{{ asset('video_gallery/' . $video_gallery->id . '/497x358_' . $video_gallery->thumbnail)}}"/>
                                                </a>
                                                <div class="news-video-title">
                                                    <span>{{$video_gallery->title}}</span>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div><!-- /.news-videos -->
                @endif
                @if($record->photo_galleries->count())
                    <div class="news-photo-gallery">
                        <div class="title-section">
                            <h1>
                                <span>Haberin Photo Galerileri</span>
                            </h1>
                        </div>
                        <div class="news-photo-gallery-body module">
                            <div class="row">
                                @foreach($record->photo_galleries as $photo_gallery)
                                    <div class="col-lg-3 col-md-3 col-xs-4">
                                        <div class="gallery-image">
                                            <a href="#">
                                                <a href="{{route('show_photo_gallery',['slug' => $photo_gallery->slug ])}}">
                                                    <img src="{{ asset('gallery/' . $photo_gallery->id . '/photos/497x358_' . $photo_gallery->thumbnail)}}"/>
                                                </a>
                                                <div class="gallery-title">
                                                    {{$photo_gallery->title}}
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div><!-- /.news-photo-gallery -->
                @endif
                @if($record->videos->count())
                    <div class="news-videos">
                        <div class="title-section">
                            <h1>
                                <span>Haberin Videoları</span>
                            </h1>
                        </div>
                        <div class="news-videos module">
                            <div class="row">
                                @foreach($record->videos as $video)
                                    <div class="col-lg-12">
                                        @if(!empty($video->file))
                                            <div class="video-box">
                                                <video id="{{$video->id}}"
                                                       class="video-js vjs-default-skin"
                                                       controls
                                                       width="100%" height="400px"
                                                       preload="auto"
                                                       poster=""
                                                       data-setup='{"example_option":true}'>
                                                    <source src="{{url($video->file)}}" type="video/mp4"/>
                                                    <source src="{{url($video->file)}}" type="video/webm"/>
                                                    <source src="{{url($video->file)}}" type="video/ogg"/>
                                                    {{--<source src="http://video-js.zencoder.com/oceans-clip.ogv" type="video/ogg" />--}}
                                                    <p class="vjs-no-js">To view this video please enable JavaScript,
                                                        and consider upgrading to a web browser that <a
                                                                href="http://videojs.com/html5-video-support/"
                                                                target="_blank">supports HTML5 video</a></p>
                                                </video>
                                            </div>
                                        @elseif(!empty($video->link))
                                            <div class="video-box">
                                                <video
                                                        id="{{$video->id}}"
                                                        class="video-js vjs-default-skin"
                                                        controls
                                                        width="100%" height="400px"
                                                        {{--data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{url($video->link)}}"}] }'--}}
                                                        data-setup='{ "techOrder": ["vimeo"], "sources": [{ "type": "video/vimeo", "src": "{{url($video->link)}}"}] }'>
                                                </video>
                                            </div>
                                        @elseif(!empty($video->embed))
                                            {!! $video->embed !!}
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if($record->photos->count())
                    <div class="news-photos">
                        <div class="title-section">
                            <h1>
                                <span>Haberin Resimleri</span>
                            </h1>
                        </div>
                        <div class="news-photos-body module">
                            <div class="row">
                                @foreach($record->photos as $photo)
                                    <div class="col-lg-12">
                                        <div class="news-photo-image">
                                            <img src="{{asset('images/news_images/4/196x150_4.jpg')}}">
                                            <div class="news-photo-title">
                                                {{$photo->name}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('news', 'news_management');
    </script>
@endsection
