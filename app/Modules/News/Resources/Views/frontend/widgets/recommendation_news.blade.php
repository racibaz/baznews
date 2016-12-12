<div class="widget">
    <div class="title-section">
        <h1>
            <span>{{trans('news.widget_title')}}</span>
        </h1>
    </div>
    <ul>
        @foreach($recommendationNewsItems as $recommendationNewsItem)
            <li><a href="{!! route('show_news', ['slug' => $recommendationNewsItem->news->slug]) !!}">{{$recommendationNewsItem->news->title}}</a></li>
        @endforeach
    </ul>
</div>

