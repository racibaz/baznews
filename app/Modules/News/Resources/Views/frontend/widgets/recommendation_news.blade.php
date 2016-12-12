<div class="widget">
    <div class="title-section">
        <h1>
            <span> Tavsiye Edilen Haberler Widget</span>
        </h1>
    </div>
    <ul>
        @foreach($recommendationNewsItems as $recommendationNewsItem)
            <li>{{ $recommendationNewsItem->news->title }}</li>
        @endforeach
    </ul>
</div>

