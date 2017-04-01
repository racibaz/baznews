@permission('index-user'))<li><a href="{!! route('user.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.users')}}</span></a></li>@endpermission
@permission('index-group'))<li><a href="{!! route('group.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.groups')}}</span></a></li>@endpermission
@permission('index-permission'))<li><a href="{!! route('permission.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.permissions')}}</span></a></li>@endpermission
@permission('index-role'))<li><a href="{!! route('role.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.roles')}}</span></a></li>@endpermission
@permission('index-country'))<li><a href="{!! route('country.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.countries')}}</span></a></li>@endpermission
@permission('index-city'))<li><a href="{!! route('city.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.cities')}}</span></a></li>@endpermission
@permission('index-contact_type'))<li><a href="{!! route('contact_type.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.contact_types')}}</span></a></li>@endpermission
@permission('index-contact'))<li><a href="{!! route('contact.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.contacts')}}</span></a></li>@endpermission
@permission('index-menu'))<li><a href="{!! route('menu.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.menus')}}</span></a></li>@endpermission
@permission('index-page'))<li><a href="{!! route('page.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.pages')}}</span></a></li>@endpermission
@permission('index-setting'))<li><a href="{!! route('setting.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.settings')}}</span></a></li>@endpermission
@permission('index-tag'))<li><a href="{!! route('tag.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.tags')}}</span></a></li>@endpermission
@permission('index-advertisement'))<li><a href="{!! route('advertisement.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.advertisements')}}</span></a></li>@endpermission
@permission('index-announcement'))<li><a href="{!! route('announcement.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.announcements')}}</span></a></li>@endpermission
@permission('index-sitemap'))<li><a href="{!! route('sitemap.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.sitemaps')}}</span></a></li>@endpermission
@permission('index-rss'))<li><a href="{!! route('rss.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.rss')}}</span></a></li>@endpermission
@permission('index-event'))<li><a href="{!! route('event.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.events')}}</span></a></li>@endpermission
@permission('index-modulemanager'))<li><a href="{!! route('module_manager.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.module_managers')}}</span></a></li>@endpermission
@permission('index-widgetmanager'))<li><a href="{!! route('widget_manager.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.widget_managers')}}</span></a></li>@endpermission
@permission('index-widgetgroup'))<li><a href="{!! route('widget_group.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.widget_groups')}}</span></a></li>@endpermission
@permission('index-thememanager'))<li><a href="{!! route('theme_manager.index') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.theme_managers')}}</span></a></li>@endpermission
@permission('index-ping'))<li><a href="{!! route('ping') !!}"><i class="fa fa-book"></i> <span>{{trans('dashboard.pings')}}</span></a></li>@endpermission
@permission('index-log'))<li><a href="admin/logs"><i class="fa fa-book"></i> <span>{{trans('dashboard.logs')}}</span></a></li>@endpermission
@permission('changes-env'))<li><a href="admin/enveditor"><i class="fa fa-book"></i> <span>{{trans('dashboard.changes_env_file')}}</span></a></li>@endpermission


<li class="header">MODULLER </li>
@foreach( Module::all() as $module)
@if(Module::isEnabled($module['slug']))
{!! Theme::view( $module['slug'] .'::backend.route_list.route_list') !!}
@endif
@endforeach