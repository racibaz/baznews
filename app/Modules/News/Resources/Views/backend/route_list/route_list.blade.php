<li class="treeview" data-name="news_management">
    <a href="#">
        <i class="fa fa-list-alt"></i> <span>{{trans('news::dashboard.news_manager')}}</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        {{--<li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>--}}
        {{--<li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>--}}
        @permission('index-newscategory')<li data-name="news_category"><a href="{!! route('news_category.index') !!}"><i class="fa fa-list-ul"></i> <span>{{trans('news::dashboard.news_categories')}}</span></a></li>@endpermission
        @permission('index-news')<li data-name="news"><a href="{!! route('news.index') !!}"><i class="fa fa-globe"></i> <span>{{trans('news::dashboard.news')}}</span></a></li>@endpermission
        @permission('index-futurenews')<li data-name="future_news"><a href="{!! route('future_news.index') !!}"><i class="fa fa-newspaper-o"></i> <span>{{trans('news::dashboard.future_news')}}</span></a></li>@endpermission
        @permission('index-newssource')<li data-name="news_source"><a href="{!! route('news_source.index') !!}"><i class="fa fa-road"></i> <span>{{trans('news::dashboard.news_source')}}</span></a></li>@endpermission
        @permission('index-photocategory')<li data-name="photo_category"><a href="{!! route('photo_category.index') !!}"><i class="fa fa-list-ul"></i> <span>{{trans('news::dashboard.photo_category')}}</span></a></li>@endpermission
        @permission('index-photo')<li data-name="photo"><a href="{!! route('photo.index') !!}"><i class="fa fa-photo"></i> <span>{{trans('news::dashboard.photo')}}</span></a></li>@endpermission
        @permission('index-recommendationnews')<li data-name="recommendation_news"><a href="{!! route('recommendation_news.index') !!}"><i class="fa fa-check-circle"></i> <span>{{trans('news::dashboard.recommendation_news')}}</span></a></li>@endpermission
        @permission('index-videocategory')<li data-name="video_category"><a href="{!! route('video_category.index') !!}"><i class="fa fa-list-alt"></i> <span>{{trans('news::dashboard.video_category')}}</span></a></li>@endpermission
        @permission('index-videogallery')<li data-name="video_gallery"><a href="{!! route('video_gallery.index') !!}"><i class="fa fa-file-video-o"></i> <span>{{trans('news::dashboard.video_gallery')}}</span></a></li>@endpermission
        @permission('index-video')<li data-name="video"><a href="{!! route('video.index') !!}"><i class="fa fa-video-camera"></i> <span>{{trans('news::dashboard.video')}}</span></a></li>@endpermission
        @permission('index-newssetting')<li data-name="news_setting"><a href="{!! route('news_setting.index') !!}"><i class="fa fa-cog"></i> <span>{{trans('news::dashboard.news_settings')}}</span></a></li>@endpermission
    </ul>
</li>
