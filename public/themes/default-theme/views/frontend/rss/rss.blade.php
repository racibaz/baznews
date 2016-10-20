@extends($activeTheme .'::backend.master')


@section('content')


    <h1>Rss Bağlantılarımız</h1>
    <br />

    @foreach($rssItems as $rssItem)

        <a href="{{$rssItem->url}}"> {{$rssItem->name}} </a>
        <br />
    @endforeach

    <br /><br /><br />


@endsection