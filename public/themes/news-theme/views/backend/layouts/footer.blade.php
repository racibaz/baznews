<footer class="main-footer">
    <div class="pull-right hidden-xs">
        {{--{{trans('theme_manager.theme')}} :--}}
        {{--{{Theme::get('name', 'default value if nothing is returned')}}--}}
        {{--({{Theme::get('version', 'default value if nothing is returned')}})--}}
    </div>
    <strong> {!! Cache::tags('Setting')->get('copyright') !!}</strong>
</footer>