@extends($activeTheme . '::frontend.master')

@section('content')


     @foreach($records as $record)
         <h1>{{$record->title}}</h1><br />
         {{$record->slug}}<br />
         {{$record->keywords}}<br />
         {{$record->description}}<br />
     @endforeach


    <br>
    {{--@widget('RecommendationNews')--}}

    @widget('\App\Modules\News\Widgets\RecommendationNews')

    <br />

    @widget('\App\Modules\Article\Widgets\RecentArticles')
    <br />

    @widget('\App\Modules\Book\Widgets\RecentBooks')

@endsection