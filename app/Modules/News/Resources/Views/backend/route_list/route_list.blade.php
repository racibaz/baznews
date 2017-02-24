<li class="active treeview">
    <a href="#">
        <i class="fa fa-dashboard"></i> <span>{{trans('news::module.module_name')}}</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        {{--<li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>--}}
        {{--<li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>--}}
        @permission('index-newscategory'))<li><a href="{!! route('news_category.index') !!}"><i class="fa fa-book"></i> <span>{{trans('news::dashboard.news_categories')}}</span></a></li>@endpermission
        @permission('index-news'))<li><a href="{!! route('news.index') !!}"><i class="fa fa-book"></i> <span>{{trans('news::dashboard.news')}}</span></a></li>@endpermission
        @permission('index-futurenews'))<li><a href="{!! route('future_news.index') !!}"><i class="fa fa-book"></i> <span>{{trans('news::dashboard.future_news')}}</span></a></li>@endpermission
        @permission('index-newssource'))<li><a href="{!! route('news_source.index') !!}"><i class="fa fa-book"></i> <span>{{trans('news::dashboard.news_source')}}</span></a></li>@endpermission
        @permission('index-photocategory'))<li><a href="{!! route('photo_category.index') !!}"><i class="fa fa-book"></i> <span>{{trans('news::dashboard.photo_category')}}</span></a></li>@endpermission
        @permission('index-photo'))<li><a href="{!! route('photo.index') !!}"><i class="fa fa-book"></i> <span>{{trans('news::dashboard.photo')}}</span></a></li>@endpermission
        @permission('index-recommendationnews'))<li><a href="{!! route('recommendation_news.index') !!}"><i class="fa fa-book"></i> <span>{{trans('news::dashboard.recommendation_news')}}</span></a></li>@endpermission
        @permission('index-videocategory'))<li><a href="{!! route('video_category.index') !!}"><i class="fa fa-book"></i> <span>{{trans('news::dashboard.video_category')}}</span></a></li>@endpermission
        @permission('index-videogallery'))<li><a href="{!! route('video_gallery.index') !!}"><i class="fa fa-book"></i> <span>{{trans('news::dashboard.video_gallery')}}</span></a></li>@endpermission
        @permission('index-video'))<li><a href="{!! route('video.index') !!}"><i class="fa fa-book"></i> <span>{{trans('news::dashboard.video')}}</span></a></li>@endpermission
    </ul>
</li>
