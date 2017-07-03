<h1> Biography Widget </h1>
<br/>
@foreach($biographies as $biography)

    {{ $biography->full_name }} <br/>
    <img src="{{ $biography->photo }}">  <br/>
@endforeach