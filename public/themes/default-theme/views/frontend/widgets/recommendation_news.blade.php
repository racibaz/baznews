<h1> Tavsiye Edilen Haberler Widget </h1>
<br />
@foreach($recommendationNewsItems as $recommendationNewsItem)

    {{ $recommendationNewsItem->news->title }} <br />
@endforeach