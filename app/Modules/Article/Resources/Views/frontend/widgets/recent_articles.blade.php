<div class="widget">
    <div class="title-section">
        <h1>
            <span>Tavsiye Edilen Makaleler Widget </span>
        </h1>
    </div>

    <ul>
        @foreach($recentArticles as $recentArticle)
            <li>
                <span class="text">{{ $recentArticle->title }}</span>
            </li>
        @endforeach
    </ul>

</div>