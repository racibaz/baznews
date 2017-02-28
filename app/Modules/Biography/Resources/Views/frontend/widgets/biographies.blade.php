<div class="widget">
    <div class="title-section">
        <h1>
            <span>Biyografiler</span>
        </h1>
    </div>
    <div class="bio-box module">
        <ul>
            @foreach($biographies as $biography)
            <li>
                <a href="{!! route('biography', ['slug' => $biography->slug]) !!}">
                    <span class="bio-img"><img src="{{ asset('images/biographies/' . $biography->id . '/104x78_' . $biography->photo) }}" alt="{{$biography->title}}" class="img-responsive"></span>
                    <span class="bio-title">{{$biography->name}}</span>
                </a>
            </li>
            @endforeach
                <li>
                    <a href="#">
                        <span class="bio-img"><img src="http://lorempixel.com/output/fashion-q-g-70-70-8.jpg" alt="" class="img-responsive"></span>
                        <span class="bio-title">Nazım Hikmet</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="bio-img"><img src="http://lorempixel.com/output/fashion-q-g-70-70-8.jpg" alt="" class="img-responsive"></span>
                        <span class="bio-title">Nazım Hikmet</span>
                    </a>
                </li>
        </ul>
    </div>
</div>