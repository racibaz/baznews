<div class="widget">
    <div class="title-section">
        <h1>
            <span>Tavisye Edilen Makaleler</span>
        </h1>
    </div>
    <div class="news-h-links">
        <ul>
            @foreach($recentArticles as $recentArticle)
                <li>
                    <a href="#">{{ $recentArticle->title }}</a>
                </li>

            @endforeach
        </ul>
    </div>
</div>
