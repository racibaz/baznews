@extends($activeTheme . '::frontend.master')

@section('content')

    <h1>{{$record->name}}</h1>
    <br />

    {{$record->created_at}}
    {{$record->updated_at}}

    <br />
    {!! $record->content !!}

@endsection