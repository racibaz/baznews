<div class="widget">
    <div class="title-section">
        <h1>
            <span>Tavsiye Edilen Makaleler Widget </span>
        </h1>
    </div>
    <div class="news-h-links module">
        <ul>
            @foreach($recentArticles as $recentArticle)
                <li>
                    <a href="{{route('article',['slug' => $recentArticle->slug])}}"><span class="text">{{ $recentArticle->title }}</span></a>
                </li>
            @endforeach
        </ul>
    </div>
</div>