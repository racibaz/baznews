<div class="widget">
    <div class="title-section">
        <h1>
            <span> Tavsiye Edilen Kitaplar Widget </span>
        </h1>
    </div>

    <div class="books-widget module">
        <ul class="books-slider">
            @foreach($recentBooks as $recentBook)
                <li>
                    <div class="book">
                        <div class="cover">
                            <a href="{!! route('book', ['slug' => $recentBook->slug]) !!}">
                                <img src="{{ asset('images/books/' . $recentBook->id . '/original/' . $recentBook->thumbnail)}}" alt="{{$recentBook->name}}"/>
                            </a>
                        </div>
                        <div class="name">
                            <a href="{!! route('book', ['slug' => $recentBook->slug]) !!}">
                                <span>{{ $recentBook->name }}</span>
                            </a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>