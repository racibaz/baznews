@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::news.management')}}
            <small>{{$record->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('news.index') !!}">{{trans('news::news.management')}}</a></li>
            <li class="active">{{$record->title}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-7">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-globe"></i>

                    <h3 class="box-title">{{trans('news::news.content')}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! $record->content !!}
                </div>
                <!-- /.box-body -->
            </div>

            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-globe"></i>

                    <h3 class="box-title">{{trans('news::news.spot')}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! $record->spot !!}
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-lg-5">
            <div class="box box-default box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->title}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>{{trans('news::news.id')}}</th>
                                <td>{{$record->id}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.user_id')}}</th>
                                <td>{{$record->user_id}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.country_id')}}</th>
                                <td>{{$record->country_id}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.city_id')}}</th>
                                <td>{{$record->city_id}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.news_source_id')}}</th>
                                <td>{{$record->news_source_id}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.title')}}</th>
                                <td>{{$record->title}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.small_title')}}</th>
                                <td>{{$record->small_title}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.slug')}}</th>
                                <td>{{$record->slug}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.short_url')}}</th>
                                <td>{{$record->short_url}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.description')}}</th>
                                <td>{{$record->description}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.keywords')}}</th>
                                <td>{{$record->keywords}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.meta_tags')}}</th>
                                <td>{{$record->meta_tags}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.cuff_photo')}}</th>
                                <td>{{$record->cuff_photo}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.thumbnail')}}</th>
                                <td>{{$record->thumbnail}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.cuff_direct_link')}}</th>
                                <td>{{$record->cuff_direct_link}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.video_embed')}}</th>
                                <td>{{$record->video_embed}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.news_type')}}</th>
                                <td>{{$record->news_type}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.map_text')}}</th>
                                <td>{{$record->map_text}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.hit')}}</th>
                                <td>{{$record->hit}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.status')}}</th>
                                <td>{{$record->status}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.band_news')}}</th>
                                <td>{{$record->band_news}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.box_cuff')}}</th>
                                <td>{{$record->box_cuff}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.is_cuff')}}</th>
                                <td>{{$record->is_cuff}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.break_news')}}</th>
                                <td>{{$record->break_news}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.main_cuff')}}</th>
                                <td>{{$record->main_cuff}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.mini_cuff')}}</th>
                                <td>{{$record->mini_cuff}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.is_comment')}}</th>
                                <td>{{$record->is_comment}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.is_show_editor_profile')}}</th>
                                <td>{{$record->is_show_editor_profile}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.is_show_previous_and_next_news')}}</th>
                                <td>{!! $record->is_show_previous_and_next_news ? '<span class="badge bg-green>"><i class="fa fa-check"></i></span>':'<span class="badge bg-warning>"><i class="fa fa-times"></i></span></span>' !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.is_active')}}</th>
                                <td>{!! $record->is_active ? '<span class="badge bg-green>">'.trans('news::news.active').'</span>':'<span class="badge bg-warning>">'.trans('news::news.passive').'</span>'!!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.created_at')}}</th>
                                <td>{{$record->created_at}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.updated_at')}}</th>
                                <td>{{$record->updated_at}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::news.deleted_at')}}</th>
                                <td>{{$record->deleted_a}}</td>
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

