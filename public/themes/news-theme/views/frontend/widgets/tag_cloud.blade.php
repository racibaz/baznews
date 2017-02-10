<div class="widget">
        <div class="title-section">
        <h1><span>{{trans('tag.tag_cloud_widget')}}</span></h1>
        </div>
        <ul>
                @foreach($tags as $tag)
                        <a href="{!! route('tag_search',['q' => $tag->name]) !!}">{{$tag->name}}</a>
                @endforeach
        </ul>
</div>
