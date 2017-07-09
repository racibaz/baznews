@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::photo_gallery.management')}}
            <small>{{trans('news::photo_category.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('photo_gallery.index') !!}">{{trans('news::photo_gallery.management')}}</a></li>
            <li class="active">{{trans('news::photo_gallery.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-image"></i>

                    <h3 class="box-title">{{trans('news::photo_gallery.add_multi_photosView')}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        @foreach($photo_gallery->photos as $photo)
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
                                <div class="thumbnail">
                                    <a href="{{asset('photos/' . $photo->id . '/' . $photo->file)}}" class="lightbox"
                                       style="display: block;overflow: hidden;height:73px;">
                                        <img src="{{asset('photos/' . $photo->id . '/' . $photo->file)}}"
                                             alt="{{$photo_gallery->name}}">
                                    </a>
                                </div><!-- /.thumbnail -->
                            </div><!-- /.col.. -->
                        @endforeach
                    </div><!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-list"></i>

                    <h3 class="box-title">{{trans('news::photo_gallery.list')}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! Form::open(['route' => 'updateGalleryPhotos','method' => 'post']) !!}

                    {!! Form::hidden('photo_gallery_id',$photo_gallery->id) !!}

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{trans('news::photo_gallery.file')}}</th>
                                <th>{{trans('news::photo_gallery.title')}}</th>
                                <th>{{trans('news::photo_gallery.content')}}</th>
                                <th>{{trans('news::photo_gallery.delete')}}</th>
                                <th>{{trans('news::photo_gallery.cuff')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($photo_gallery->photos as $photo)
                                <tr>
                                    <td>
                                        <a href="{{asset('photos/' . $photo->id . '/' . $photo->file)}}"
                                           class="thumbnail"
                                           style="display: block;overflow: hidden;height:120px;width:120px;">
                                            <img src="{{asset('photos/' . $photo->id . '/' . $photo->file)}}"
                                                 height="73">
                                        </a>
                                    </td>
                                    <td>{!! Form::text('subtitle/'. $photo->id, $photo->subtitle, ['placeholder' => trans('news::photo_gallery.title') ,'class' => 'form-control']) !!}</td>
                                    <td>{!! Form::textarea('content/'. $photo->id, $photo->content, ['placeholder' => trans('news::photo_gallery.content') ,'class' => 'form-control','rows'=>'2']) !!}</td>
                                    <td>
                                        <label>
                                            {!! Form::checkbox('delete/' . $photo->id, null , null) !!}
                                            {{trans('news::photo_gallery.delete_photo')}}
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            {!! Form::radio('is_cuff_thumbnail', $photo->id, $photo->file == $photo_gallery->thumbnail ? true : false ) !!}
                                            {{trans('news::photo_gallery.is_photo_gallery_cuff_thumbnail')}}
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                    <div class="box-footer">
                        <div class="form-group">
                            <button class="btn btn-success" type="submit"><i
                                        class="fa fa-check-square-o"></i> {{trans('news::photo_gallery.updateSubtitleAndContent')}}
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div><!-- end row -->


    {!! Form::open(['route' => 'addMultiPhotos','method' => 'post', 'class' => 'dropzone', 'id' => 'addPhotos', 'files' => 'true']) !!}

    {{ csrf_field() }}

    {!! Form::hidden('photo_gallery_id', $photo_gallery->id) !!}
    {!! Form::close() !!}

@endsection


@section('js')

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

    <script>
        Dropzone.options.addPhotos = {

            maxFileSize: 100,
            acceptedFiles: 'image/*',
            dictDefaultMessage: '{{trans('news::photo_gallery.drag_files')}}',
            success: function (file, response) {

                if (file.status === 'success') {
                    handleDropzoneFileUpload.handleSuccess(response);
                } else {
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
        //active menu
        activeMenu('photo_gallery', 'news_management');

    </script>

@endsection