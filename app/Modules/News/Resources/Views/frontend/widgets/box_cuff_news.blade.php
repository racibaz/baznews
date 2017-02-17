<div class="widget">
    <div class="title-section">
        <h1>
            <span>{{trans('news.box_cuff_widget_title')}}</span>
        </h1>
    </div>
    <div class="news-h-links">
        <ul>
            @foreach($boxCuffNewsItmes as $boxCuffNewsItme)
                <li><a href="{!! route('show_news', ['slug' => $boxCuffNewsItme->slug]) !!}">{{$boxCuffNewsItme->title}}</a></li>
            @endforeach
        </ul>
    </div>
</div>

