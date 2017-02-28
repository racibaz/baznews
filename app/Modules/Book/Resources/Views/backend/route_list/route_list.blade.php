<li class="treeview">
    <a href="#">
        <i class="fa fa-share"></i> <span>{{trans('book::module.module_name')}}</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        @permission('index-bookcategory'))<li><a href="{!! route('book_category.index') !!}"><i class="fa fa-book"></i> <span>{{trans('book::dashboard.book_categories')}}</span></a></li>@endpermission
        @permission('index-book'))<li><a href="{!! route('book.index') !!}"><i class="fa fa-book"></i> <span>{{trans('book::dashboard.books')}}</span></a></li>@endpermission
        @permission('index-bookpublisher'))<li><a href="{!! route('book_publisher.index') !!}"><i class="fa fa-book"></i> <span>{{trans('book::dashboard.book_publishers')}}</span></a></li>@endpermission
        @permission('index-bookauthor'))<li><a href="{!! route('book_author.index') !!}"><i class="fa fa-book"></i> <span>{{trans('book::dashboard.book_authors')}}</span></a></li>@endpermission
        @permission('index-booksetting'))<li><a href="{!! route('book_setting.index') !!}"><i class="fa fa-book"></i> <span>{{trans('book::dashboard.book_settings')}}</span></a></li>@endpermission

    </ul>
</li>