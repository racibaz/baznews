@extends($activeTheme . '::frontend.master')

@section('content')

    <h1>breakNewsItems</h1>
    <br />
    @foreach($breakNewsItems as $breakNewsItem)
        {{$breakNewsItem->title}} <br/>
    @endforeach

    <h1>bandNewsItem</h1>
    <br />
    @foreach($bandNewsItems as $bandNewsItem)
        {{$bandNewsItem->title}} <br/>
    @endforeach

    <h1>mainCuffNewsItems</h1>
    <br />
    @foreach($mainCuffNewsItems as $mainCuffNewsItem)
        {{$mainCuffNewsItem->title}} <br/>
    @endforeach

    <h1>miniCuffNewsItems</h1>
    <br />
    @foreach($miniCuffNewsItems as $miniCuffNewsItem)
        {{$miniCuffNewsItem->title}} <br/>
    @endforeach

@endsection

@section('widgets')

    @foreach($modules as $module)

        @if($module['widget'] == true )

            {!! Theme::view($module['slug'] . '::frontend.widget') !!}
        @endif

    @endforeach



    {{--@include($activeTheme . '::frontend.book.index')--}}

@endsection
