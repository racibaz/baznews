<div class="widget">
    <div class="title-section">
        <h1>
            <span>{{trans('news::news.box_cuff_widget_title')}}</span>
        </h1>
    </div>
    <div>
        <ul class="news-list">
            @foreach($boxCuffNewsItmes as $boxCuffNewsItme)
                <li class="module">
                    <div class="imgwrap">
                        <a href="{!! route('show_news', ['slug' => $boxCuffNewsItme->slug]) !!}">
                            <img src="{{ asset('images/news_images/' . $boxCuffNewsItme->id . '/58x58_' . $boxCuffNewsItme->thumbnail )}}" alt="">
                        </a>
                    </div><!-- /imgwrap -->
                    <div class="text">
                        <div class="title">
                            <a href="{!! route('show_news', ['slug' => $boxCuffNewsItme->slug]) !!}">
                                <h3>
                                    {{$boxCuffNewsItme->title}}
                                </h3>
                            </a>
                        </div><!-- /.title -->
                        <div class="excerpt">{{$boxCuffNewsItme->spot}}</div>
                        <time class="new-date">
                            <span class="timeago">{{$boxCuffNewsItme->created_at}}</span>
                        </time>
                    </div><!-- /.text -->
                </li>
            @endforeach
        </ul>
    </div>
</div>

