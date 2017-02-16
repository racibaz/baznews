<div class="widget">
    <div class="title-section">
        <h1>
            <span> Tavsiye Edilen Kitaplar Widget </span>
        </h1>
    </div>

    <ul class="books-widget">
        @foreach($recentBooks as $recentBook)
            <li>
                <img src="{{ $recentBook->thumbnail }}">  <br />
                <span class="text">{{ $recentBook->name }} <br /></span>
            </li>
        @endforeach
            <li>
                <img src="{{ $recentBook->thumbnail }}">  <br />
                <span class="text">{{ $recentBook->name }} <br /></span>
            </li>
    </ul>
</div>