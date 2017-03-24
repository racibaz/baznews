<div class="widget">
    <div class="title-section">
        <h1><span>{{trans('tag.tag_cloud_widget')}}</span></h1>
    </div>
    <div class="tag-cloud module" style="padding: 10px;">
        @foreach($tags as $index => $tag)
            <a href="{!! route('tag_search',['q' => $tag->name]) !!}" rel="{{$index}}">{{$tag->name}}</a>
        @endforeach
    </div>
</div>
@push('js')
    <script type="text/javascript" src="{{ Theme::asset($activeTheme . '::js/jquery.tagcloud/jquery.tagcloud.js') }}"></script>
    <script type="text/javascript">
        $.fn.tagcloud.defaults = {
            size: {start: 11, end: 16, unit: 'pt'},
            color: {start: '#EA4335', end: '#40819A'}
        };

        $(function () {
            $('.tag-cloud a').tagcloud();
        });
    </script>
@endpush
