<li class="treeview" data-name="article_management">
    <a href="#">
        <i class="fa fa-book"></i> <span>{{trans('article::dashboard.article_manager')}}</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        @permission('index-articleauthor')
        <li data-name="authors"><a href="{!! route('article_author.index') !!}"><i class="fa fa-user"></i>
                <span>{{trans('article::dashboard.authors')}}</span></a></li>@endpermission
        @permission('index-article')
        <li data-name="articles"><a href="{!! route('article.index') !!}"><i class="fa fa-file-text"></i>
                <span>{{trans('article::dashboard.articles')}}</span></a></li>@endpermission
        @permission('index-articlecategory')
        <li data-name="article_categories"><a href="{!! route('article_category.index') !!}"><i class="fa fa-list"></i>
                <span>{{trans('article::dashboard.article_categories')}}</span></a></li>@endpermission
        @permission('index-articlesetting')
        <li data-name="article_settings"><a href="{!! route('article_setting.index') !!}"><i class="fa fa-cog"></i>
                <span>{{trans('article::dashboard.article_settings')}}</span></a></li>@endpermission
    </ul>
</li>
