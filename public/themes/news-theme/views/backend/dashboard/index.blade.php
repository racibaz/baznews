@extends($activeTheme . '::backend.master')

@section('content')

  @foreach($userGroupsAnnouncements as $userGroupsAnnouncement)
    {{$userGroupsAnnouncement->title}} <br />
  @endforeach

  {{trans('user.active_user_count')}} : {{$activeUserCount}} <br/>
  {{trans('user.passive_user_count')}} : {{$passiveUserCount}} <br/>
  {{trans('group.active_group_count')}} : {{$activeGroupCount}} <br/>
  {{trans('group.passive_group_count')}} : {{$passiveGroupCount}} <br/>
  {{trans('page.active_page_count')}} : {{$activePageCount}} <br/>
  {{trans('page.passive_page_count')}} : {{$passivePageCount}} <br/>
  {{trans('menu.active_menu_count')}} : {{$activeMenuCount}} <br/>
  {{trans('menu.passive_menu_count')}} : {{$passiveMenuCount}} <br/>

@endsection