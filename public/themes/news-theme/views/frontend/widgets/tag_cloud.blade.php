<div class="widget">
    <div class="title-section">
        <h1><span>{{trans('tag.tag_cloud_widget')}}</span></h1>
    </div>
    <div class="tag-cloud">
        @foreach($tags as $tag)
            <a href="{!! route('tag_search',['q' => $tag->name]) !!}">{{$tag->name}}</a>
        @endforeach
    </div>
</div>
@section('js')
    <script type="text/javascript" src="{{ Theme::asset($activeTheme . '::js/jquery.tagcloud/jquery.tagcloud.js') }}"></script>
    <script type="text/javascript">
        $.fn.tagcloud.defaults = {
            size: {start: 14, end: 18, unit: 'pt'},
            color: {start: '#cde', end: '#f52'}
        };
        $(document).ready(function () {
            $('.tag-cloud a').tagcloud();
        });
    </script>
@endsection