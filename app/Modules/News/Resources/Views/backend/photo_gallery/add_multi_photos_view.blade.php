@extends($activeTheme .'::backend.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" />
@endsection

@section('content')

    {!! Form::open(['route' => 'addMultiPhotos','method' => 'post', 'class' => 'dropzone', 'id' => 'addPhotos', 'files' => 'true']) !!}

        {{ csrf_field() }}

        {!! Form::hidden('photo_gallery_id', $photo_gallery_id) !!}
    {!! Form::close() !!}

@endsection


@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
@endsection