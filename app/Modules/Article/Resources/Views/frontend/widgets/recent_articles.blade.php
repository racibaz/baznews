<div class="widget">
    <div class="title-section">
        <h1>
            <span>{{trans('article::article.recent_articles')}}</span>
        </h1>
    </div>
    <div class="news-h-links avatar-links  module">
        <ul>
            @foreach($recentArticles as $recentArticle)
                <li>
                    <a href="{{route('article',['slug' => $recentArticle->slug])}}">
                        <div class="item-inner">
                            <h2>{{ $recentArticle->title }}</h2>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>