@extends($activeTheme .'::backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!--Top header start-->
            <h3 class="ls-top-header">{{trans('book::book_category.managment')}}</h3>
            <!--Top header end -->

            <!--Top breadcrumb start -->
            <ol class="breadcrumb">
                <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! URL::route('book_category.index') !!}"> {{ trans('book::book_category.book_categories') }} </a></li>
                <li class="active"> {{ trans('book::common.add_update') }}</li>
            </ol>
            <!--Top breadcrumb start -->
        </div>
    </div>
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-light-blue">
                <div class="panel-heading">
                    {{--/<h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>--}}
                </div>

                @if(isset($record->id))
                    {!! Form::model($record, ['route' => ['book_category.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
                @else
                    {!! Form::open(['route' => 'book_category.store','method' => 'post', 'files' => 'true']) !!}
                @endif
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('parent_id', trans('book::book_category.parent_id'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::select('parent_id', $bookCategoryList , $record->parent_id , ['placeholder' => trans('book::common.please_choose'),'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('_lft', trans('book::book_category._lft'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('_lft', $record->_lft, ['placeholder' => trans('book::book_category._lft') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('_rgt', trans('book::book_category._rgt'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('_rgt', $record->_rgt, ['placeholder' => trans('book::book_category._rgt') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('name', trans('book::book_category.name'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('name', $record->name, ['placeholder' => trans('book::book_category.name') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('slug', trans('book::book_category.slug'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('slug', $record->slug, ['placeholder' => trans('book::book_category.slug') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('description', trans('book::book_category.description'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('description', $record->description, ['placeholder' => trans('book::book_category.description') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('keywords', trans('book::book_category.keywords'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::textarea('keywords', $record->keywords, ['placeholder' => trans('book::book_category.keywords') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('order', trans('book::book_category.order'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('order', $record->order, ['placeholder' => trans('book::book_category.order') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('thumbnail', trans('book::book_category.thumbnail'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::file('thumbnail') !!}
                                    <img id="preview" src="#" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {{trans('book::common.status')}}
                                <div class="col-lg-offset-2 col-lg-10">
                                    <div class="checkbox i-checks">
                                        <label>
                                            {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                                            <i></i> {{trans('book::common.is_cuff')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {{trans('book::common.status')}}
                                <div class="col-lg-offset-2 col-lg-10">
                                    <div class="checkbox i-checks">
                                        <label>
                                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                            <i></i> {{trans('book::common.is_active')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                                </div>
                            </div>
                        </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div><!-- end row -->
    <!-- Main Content Element  End-->
</div><!-- end container-fluid -->
@endsection

@section('css')
    <style>
        #preview {display: none;}
        .display {display: block !important;}
    </style>
@endsection


@section('js')

    {{--<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>--}}

    {{--<script>--}}
    {{--CKEDITOR.replace( 'content', {--}}
    {{--filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',--}}
    {{--filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',--}}
    {{--filebrowserBrowseUrl: '/laravel-filemanager?type=Files',--}}
    {{--filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'--}}
    {{--});--}}
    {{--</script>--}}


    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    {{--<textarea name="content" class="form-control my-editor">{!! old('content', $content) !!}</textarea>--}}
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea.content",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>


    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                $( "#preview" ).addClass( "display" );
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#thumbnail").change(function(){
            readURL(this);
        });
    </script>

@endsection

