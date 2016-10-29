<h1> Tavsiye Edilen Kitaplar Widget </h1>
<br />
@foreach($recentBooks as $recentBook)

    {{ $recentBook->name }} <br />
    <img src="{{ $recentBook->thumbnail }}">  <br />
@endforeach