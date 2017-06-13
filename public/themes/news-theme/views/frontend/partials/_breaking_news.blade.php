<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if($breakNewsItems->count() > 0)
                <div class="ticker last-time" id="son-dakika">
                    <strong>{{ trans('news::news.breaking_news') }}</strong>
                    <ul>
                        @foreach($breakNewsItems as $breakNewsItem)
                            <li>
                                <a href="{!! route('show_news', ['slug' => $breakNewsItem->slug]) !!}">{{$breakNewsItem->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
