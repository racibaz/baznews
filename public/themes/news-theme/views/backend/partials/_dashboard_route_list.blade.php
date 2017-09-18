<li data-name="home"><a href="/admin"><i class="fa fa-home"></i> <span>{{trans('dashboard.home_page')}}</span></a></li>

<li class="header">MODÜLLER</li>
@foreach( Module::all() as $module)
    @if(Module::isEnabled($module['slug']))
        {!! Theme::view( $module['slug'] .'::backend.route_list.route_list') !!}
    @endif
@endforeach

<li class="header">Core</li>
<li class="treeview" data-name="user_management">
    <a href="#">
        <i class="fa fa-users"></i> <span>{{trans('dashboard.user_management')}}</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        @permission('index-user')
        <li data-name="user"><a href="{!! route('user.index') !!}"><i class="fa fa-user"></i>
                <span>{{trans('dashboard.users')}}</span></a></li>@endpermission
        @permission('index-group')
        <li data-name="group"><a href="{!! route('group.index') !!}"><i class="fa fa-users"></i>
                <span>{{trans('dashboard.groups')}}</span></a></li>@endpermission
        @permission('index-role')
        <li data-name="role"><a href="{!! route('role.index') !!}"><i class="fa fa-road"></i>
                <span>{{trans('dashboard.roles')}}</span></a></li>@endpermission
        @permission('index-permission')
        <li data-name="permission"><a href="{!! route('permission.index') !!}"><i class="fa fa-lock"></i>
                <span>{{trans('dashboard.permissions')}}</span></a></li>@endpermission
    </ul>
</li>
<li class="treeview" data-name="general_setting">
    <a href="#">
        <i class="fa fa-cogs"></i> <span>{{trans('dashboard.general_settings')}}</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        @permission('index-setting')
        <li data-name="setting"><a href="{!! route('setting.index') !!}"><i class="fa fa-cog"></i>
                <span>{{trans('dashboard.settings')}}</span></a></li>@endpermission
        @permission('index-country')
        <li data-name="country"><a href="{!! route('country.index') !!}"><i class="fa fa-globe"></i>
                <span>{{trans('dashboard.countries')}}</span></a></li>@endpermission
        @permission('index-city')
        <li data-name="city"><a href="{!! route('city.index') !!}"><i class="fa fa-map-marker"></i>
                <span>{{trans('dashboard.cities')}}</span></a></li>@endpermission
        @permission('index-ping')
        <li data-name="ping"><a href="{!! route('ping') !!}"><i class="fa fa-bullseye"></i>
                <span>{{trans('dashboard.pings')}}</span></a></li>@endpermission
        @permission('index-log')
        <li data-name="logs"><a href="{!! route('logs') !!}"><i class="fa fa-list-ul"></i>
                <span>{{trans('dashboard.logs')}}</span></a></li>@endpermission
        @permission('index-env')
        <li data-name="env"><a href="{!! url('admin/enveditor') !!}"><i class="fa fa-code-fork"></i>
                <span>{{trans('dashboard.changes_env_file')}}</span></a></li>@endpermission
    </ul>
</li>
<li class="treeview" data-name="widget_management">
    <a href="#">
        <i class="fa fa-th-large"></i> <span>{{trans('dashboard.widget_management')}}</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        @permission('index-widgetmanager')
        <li data-name="widget"><a href="{!! route('widget_manager.index') !!}"><i class="fa fa-th-large"></i>
                <span>{{trans('dashboard.widget')}}</span></a></li>@endpermission
        @permission('index-widgetgroup')
        <li data-name="group"><a href="{!! route('widget_group.index') !!}"><i class="fa fa-archive"></i>
                <span>{{trans('dashboard.widget_groups')}}</span></a></li>@endpermission
    </ul>
</li>
@permission('index-contacttype')
<li data-name="contact_types"><a href="{!! route('contact_type.index') !!}"><i class="fa fa-book"></i>
        <span>{{trans('dashboard.contact_types')}}</span></a></li>@endpermission
@permission('index-contact')
<li data-name="contact_management"><a href="{!! route('contact.index') !!}"><i class="fa fa-phone"></i>
        <span>{{trans('dashboard.contacts')}}</span></a></li>@endpermission
@permission('index-menu')
<li data-name="menu_management"><a href="{!! route('menu.index') !!}"><i class="fa fa-list"></i>
        <span>{{trans('dashboard.menus')}}</span></a></li>@endpermission
@permission('index-page')
<li data-name="page"><a href="{!! route('page.index') !!}"><i class="fa fa-file-text-o"></i>
        <span>{{trans('dashboard.pages')}}</span></a></li>@endpermission
@permission('index-tag')
<li data-name="tag"><a href="{!! route('tag.index') !!}"><i class="fa fa-tags"></i>
        <span>{{trans('dashboard.tags')}}</span></a></li>@endpermission
@permission('index-advertisement')
<li data-name="advertisement"><a href="{!! route('advertisement.index') !!}"><i class="fa fa-diamond"></i>
        <span>{{trans('dashboard.advertisements')}}</span></a></li>@endpermission
@permission('index-announcement')
<li data-name="announcement"><a href="{!! route('announcement.index') !!}"><i class="fa fa-bullhorn"></i>
        <span>{{trans('dashboard.announcements')}}</span></a></li>@endpermission
@permission('index-sitemap')
<li data-name="sitemap"><a href="{!! route('sitemap.index') !!}"><i class="fa fa-book"></i>
        <span>{{trans('dashboard.sitemaps')}}</span></a></li>@endpermission
@permission('index-rss')
<li data-name="rss"><a href="{!! route('rss.index') !!}"><i class="fa fa-rss"></i>
        <span>{{trans('dashboard.rss')}}</span></a></li>@endpermission
@permission('index-event')
<li data-name="event"><a href="{!! route('event.index') !!}"><i class="fa fa-calendar"></i>
        <span>{{trans('dashboard.events')}}</span></a></li>@endpermission
@permission('index-modulemanager')
<li data-name="module_manager"><a href="{!! route('module_manager.index') !!}"><i class="fa fa-th"></i>
        <span>{{trans('dashboard.module_managers')}}</span></a></li>@endpermission
@permission('index-thememanager')
<li data-name="theme_manager"><a href="{!! route('theme_manager.index') !!}"><i class="fa fa-file-code-o"></i>
        <span>{{trans('dashboard.theme_managers')}}</span></a></li>@endpermission
{{--@permission('index-apimanager')--}}
<li data-name="api_manager"><a href="{!! route('api_manager') !!}"><i class="fa fa-file-code-o"></i>
        <span>{{trans('api_manager.management')}}</span></a></li>
{{--@endpermission--}}