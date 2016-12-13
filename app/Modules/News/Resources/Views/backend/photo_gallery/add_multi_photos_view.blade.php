@extends($activeTheme .'::backend.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" />
@endsection

@section('content')
    <ul>
        @foreach($photo_gallery->photos as $photo)
                <li>
                    <img src="{{asset('gallery/' . $photo_gallery->slug . '/photos/' . $photo->file)}}">
                </li>
        @endforeach

    <div class="row">
        <div class="col-md-6">
            <div id="gallery-photos">
                <ul>
                    {!! Form::open(['route' => 'updateGalleryPhotos','method' => 'post']) !!}

                        {!! Form::hidden('photo_gallery_id',$photo_gallery->id) !!}

                        @foreach($photo_gallery->photos as $photo)
                            <li>

                                <div class="form-group">
                                    <div class="row">
                                        {{trans('news::news.delete_photo')}}
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <div class="checkbox i-checks">
                                                <label>
                                                    {!! Form::checkbox('delete/' . $photo->id, null , null) !!}
                                                    <i></i> {{trans('news::news.delete_photo')}}
                                                </label>
                                                <label>
                                                    {!! Form::radio('is_cuff_thumbnail', $photo->id, $photo->file == $photo_gallery->thumbnail ? true : false ) !!}
                                                    <i></i> {{trans('news::news.is_photo_gallery_cuff_thumbnail')}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--<a href="{{$photo->file}}" target="_blank">--}}
                                    <img src="{{asset('gallery/' . $photo_gallery->slug . '/photos/' . $photo->file)}}" width="240"  height="150">
                                    {!! Form::text('subtitle/'. $photo->id, $photo->subtitle, ['placeholder' => trans('news::photo_gallery.subtitle') ,'class' => 'form-control']) !!}
                                    {!! Form::textarea('content/'. $photo->id, $photo->content, ['placeholder' => trans('news::photo_gallery.subtitle') ,'class' => 'form-control']) !!}
                                {{--</a>--}}
                            </li>
                        @endforeach

                        <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('photo.updateSubtitleAndContent')}}</button>

                    {!! Form::close() !!}
                </ul>
            </div>
        </div>
    </div><!-- end row -->


    {!! Form::open(['route' => 'addMultiPhotos','method' => 'post', 'class' => 'dropzone', 'id' => 'addPhotos', 'files' => 'true']) !!}

        {{ csrf_field() }}

        {!! Form::hidden('photo_gallery_id', $photo_gallery->id) !!}
    {!! Form::close() !!}

@endsection


@section('js')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

    <script>
        Dropzone.options.addPhotos = {

            maxFileSize: 100,
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

                var $photoList = $('#gallery-photos ul');
                var photoSrc = baseUrl + '/' + response.file;
                $($photoList).append('<li> <a href="' + photoSrc + '"><img src="' + $photoSrc + '"></a></li>');
            }
        };

    </script>

@endsection