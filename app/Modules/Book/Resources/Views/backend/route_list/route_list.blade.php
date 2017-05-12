<li class="treeview" data-name="book_management">
    <a href="#">
        <i class="fa fa-book"></i> <span>{{trans('book::dashboard.book_manager')}}</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        @permission('index-bookcategory')<li data-name="book_categories"><a href="{!! route('book_category.index') !!}"><i class="fa fa-list-ol"></i> <span>{{trans('book::dashboard.book_categories')}}</span></a></li>@endpermission
        @permission('index-book')<li data-name="books"><a href="{!! route('book.index') !!}"><i class="fa fa-book"></i> <span>{{trans('book::dashboard.books')}}</span></a></li>@endpermission
        @permission('index-bookpublisher')<li data-name="book_publishers"><a href="{!! route('book_publisher.index') !!}"><i class="fa fa-line-chart"></i> <span>{{trans('book::dashboard.book_publishers')}}</span></a></li>@endpermission
        @permission('index-bookauthor')<li data-name="book_authors"><a href="{!! route('book_author.index') !!}"><i class="fa fa-user"></i> <span>{{trans('book::dashboard.book_authors')}}</span></a></li>@endpermission
        @permission('index-booksetting')<li data-name="book_settings"><a href="{!! route('book_setting.index') !!}"><i class="fa fa-cog"></i> <span>{{trans('book::dashboard.book_settings')}}</span></a></li>@endpermission
    </ul>
</li>