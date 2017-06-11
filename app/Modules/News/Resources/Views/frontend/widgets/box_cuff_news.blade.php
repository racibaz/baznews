<div class="widget">
    <div class="title-section">
        <h1>
            <span>{{trans('news::news.box_cuff_widget_title')}}</span>
        </h1>
    </div>
    <div>
        <ul class="news-list">
            @foreach($boxCuffNewsItems as $boxCuffNewsItem)
                <li class="module">
                    <div class="imgwrap">
                        <a href="{!! route('show_news', ['slug' => $boxCuffNewsItem->slug]) !!}">
                            <img src="{{ asset('images/news_images/' . $boxCuffNewsItem->id . '/58x58_' . $boxCuffNewsItem->thumbnail )}}" alt="">
                        </a>
                    </div><!-- /imgwrap -->
                    <div class="text">
                        <div class="title">
                            <a href="{!! route('show_news', ['slug' => $boxCuffNewsItem->slug]) !!}">
                                <h3>
                                    {{$boxCuffNewsItem->title}}
                                </h3>
                            </a>
                        </div><!-- /.title -->
                        <div class="excerpt">{{$boxCuffNewsItem->spot}}</div>
                        <time class="new-date">
                            <span class="timeago">{{$boxCuffNewsItem->created_at->diffForHumans() }}</span>
                        </time>
                    </div><!-- /.text -->
                </li>
            @endforeach
        </ul>
    </div>
</div>

