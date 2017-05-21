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
