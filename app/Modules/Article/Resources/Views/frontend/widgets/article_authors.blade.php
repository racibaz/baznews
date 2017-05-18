<div class="widget">
    <div class="title-section">
        <div class="pull-right">
            <a href="{{route('article_authors')}}" class="btn btn-primary">{{trans('article::article.article_authors')}}</a>
        </div>
        <h3>
            <span>Yazarlar Widget </span>
        </h3>
    </div>
    <div class="news-h-links avatar-links  module">
        <ul>
            @foreach($articleAuthors as $articleAuthor)
                <li>
                    <a href="{{route('article_author',['slug' => $articleAuthor->slug])}}">
                        <div class="item-left">
                            <img src="{{ asset('images/article_author_images/' . $articleAuthor->id . '/58x58_' . $articleAuthor->photo)}}">
                        </div>
                        <div class="item-inner">
                            <h2>{{ $articleAuthor->name }}</h2>
                            <p>{{ $articleAuthor->bio_note }}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>