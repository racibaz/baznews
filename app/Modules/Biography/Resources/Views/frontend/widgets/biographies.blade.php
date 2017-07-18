<div class="widget">
    <div class="title-section">
        <h1>
            <span>{{trans('biography::biography.biographies')}}</span>
        </h1>
    </div>
    <div class="bio-box module">
        <ul>
            @foreach($biographies as $biography)
                <li>
                    <a href="{!! route('biography', ['slug' => $biography->slug]) !!}">
                    <span class="bio-img">
                        <img src="{{ asset('images/biographies/' . $biography->id . '/104x78_' . $biography->photo) }}"
                             alt="{{$biography->title}}" class="img-responsive"></span>
                        <div class="bio-detail">
                            <span class="bio-title">{{$biography->name}}</span>
                            <span class="bio-excerpt">{{$biography->spot}}</span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>