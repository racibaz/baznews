<div class="widget">
    <div class="title-section">
        <h1>
            <span>Yazarlar Widget </span>
        </h1>
    </div>
    <div class="news-h-links module">
        <ul>
            @foreach($articleAuthors as $articleAuthor)
                <li>
                    <a href="{{route('article_author',['slug' => $articleAuthor->slug])}}">
                        <img src="{{ asset('images/article_author_images/' . $articleAuthor->id . '/58x58_' . $articleAuthor->photo)}}">
                        <span class="text">{{ $articleAuthor->name }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>