<div class="widget">
    <div class="title-section">
        <h1>
            <span>{{trans('biography.widget_title')}}</span>
        </h1>
    </div>
    <ul>
        @foreach($biographies as $biography)
            <li>
                {{ $biography->full_name }} <br />
                <img src="{{ $biography->photo }}">  <br />
            </li>
        @endforeach
    </ul>
</div>
