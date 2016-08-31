<h1>Ön sayfa</h1>


<h1>
    <ul>
        @foreach($records as $record)
            <li>{{$record->id}}</li>
            <li>{{$record->first_name}}</li>
        @endforeach
    </ul>
</h1>