<footer class="main-footer">
    <div class="pull-right hidden-xs">
        {{trans('theme_manager.theme')}} :
        {{Theme::getProperty('news-theme::name', 'default value if nothing is returned')}}
        ({{Theme::getProperty('news-theme::version', 'default value if nothing is returned')}})
    </div>
    <strong> {!! Cache::tags('Setting')->get('copyright') !!}</strong>
</footer>