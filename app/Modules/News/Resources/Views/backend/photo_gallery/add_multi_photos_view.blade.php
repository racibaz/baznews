@extends($activeTheme .'::backend.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" />
@endsection

@section('content')
    <ul>
        @foreach($photo_gallery->photos as $photo)
                <li>
                    <img src="{{$photo->file}}">
                </li>
        @endforeach

    </ul>
    {!! Form::open(['route' => 'addMultiPhotos','method' => 'post', 'class' => 'dropzone', 'id' => 'addPhotos', 'files' => 'true']) !!}

        {{ csrf_field() }}

        {!! Form::hidden('photo_gallery_id', $photo_gallery_id) !!}
    {!! Form::close() !!}

@endsection


@section('js')

    <script>
            Dropzone.options.addPhotos = {

                maxFileSize: 2,
                acceptedFiles : 'image/*',
                success: function (file, response) {

                    if(file.status == 'success'){
                        handleDropzoneFileUpload.handleSuccess(response);
                    }else {
                        handleDropzoneFileUpload.handleError(response);
                    }
                }

            };
        
        
        var handleDropzoneFileUpload = {
            
            handleError: function (response) {
                console.log(response);
            },
            handleSuccess: function (response) {
                console.log(response);
            }
            
        };


    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
@endsection