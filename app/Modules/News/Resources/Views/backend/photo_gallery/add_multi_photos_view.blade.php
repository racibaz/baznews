@extends($activeTheme .'::backend.master')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" />
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div id="galler-photos">
                <ul>
                    {!! Form::open(['route' => 'updateGalleryPhotos','method' => 'post']) !!}

                        @foreach($photo_gallery->photos as $photo)
                            <li>
                                {{--<a href="{{$photo->file}}" target="_blank">--}}
                                    <img src="{{url($photo->file)}}" width="240"  height="150">
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


    </script>

@endsection