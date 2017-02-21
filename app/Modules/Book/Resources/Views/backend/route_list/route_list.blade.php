<li class="treeview">
    <a href="#">
        <i class="fa fa-share"></i> <span>{{trans('book::module.module_name')}}</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{!! route('book_category.index') !!}"><i class="fa fa-book"></i> <span>Kitap Kategorileri</span></a></li>
        <li><a href="{!! route('book.index') !!}"><i class="fa fa-book"></i> <span>Kitap</span></a></li>
        <li><a href="{!! route('publisher.index') !!}"><i class="fa fa-book"></i> <span>Yayıncılar</span></a></li>
        <li><a href="{!! route('book_author.index') !!}"><i class="fa fa-book"></i> <span>Kitap Yazarları</span></a></li>
    </ul>
</li>