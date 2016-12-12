<div class="widget">
    <div class="title-section">
        <h1>
            <span> Tavsiye Edilen Kitaplar Widget </span>
        </h1>
    </div>

    <ul>
        @foreach($recentBooks as $recentBook)
            <li>
                <span class="text">{{ $recentBook->name }} <br /></span>
                <img src="{{ $recentBook->thumbnail }}">  <br />
            </li>
        @endforeach
    </ul>
</div>