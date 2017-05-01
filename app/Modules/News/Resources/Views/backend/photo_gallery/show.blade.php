@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::photo_gallery.management')}}
            <small>{{$record->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('photo_gallery.index') !!}">{{trans('news::photo_gallery.management')}}</a></li>
            <li class="active">{{$record->title}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->title}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th width="20%">{{trans('news::photo_gallery.id')}}</th>
                                <td>{{$record->id}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_gallery.photo_category_id')}}</th>
                                <td>{{$record->photo_category_id}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_gallery.title')}}</th>
                                <td>{{$record->title}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_gallery.slug')}}</th>
                                <td>{{$record->slug}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_gallery.short_url')}}</th>
                                <td>{{$record->short_url}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_gallery.description')}}</th>
                                <td>{{$record->description}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_gallery.keywords')}}</th>
                                <td>{{$record->keywords}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_gallery.thumbnail')}}</th>
                                <td>{{$record->thumbnail}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_gallery.is_cuff')}}</th>
                                <td>{{$record->is_cuff}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_gallery.is_active')}}</th>
                                <td>{{$record->is_active}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>


        </div>
    </div>
@endsection

