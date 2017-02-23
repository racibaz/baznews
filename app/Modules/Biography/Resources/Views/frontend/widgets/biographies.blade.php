<ul>
    @foreach($biographies as $biography)
        <li>
            <a href="{!! route('biography', ['slug' => $biography->slug]) !!}">{{$biography->name}}</a>
            <img src="{{ asset('images/biographies/' . $biography->id . '/104x78_' . $biography->photo) }}" alt="{{$biography->title}}">
        </li>
    @endforeach
</ul>
