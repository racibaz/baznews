@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('article::article.management')}}
            <small>{{$record->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('article.index') !!}">{{trans('article::article.management')}}</a></li>
            <li class="active">{{$record->title}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->title}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>

                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                            <tr>
                                <th width="20%">{{trans('common.id')}}</th>
                                <td>{{$record->id}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('user.name')}}</th>
                                <td>{{$record->user->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article.author_name')}}</th>
                                <td>{{$record->article_author->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article.title')}}</th>
                                <td>{{$record->title}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('common.slug')}}</th>
                                <td>{{$record->slug}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article.short_url')}}</th>
                                <td>{{$record->short_url}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article.subtitle')}}</th>
                                <td>{{$record->subtitle}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article.spot')}}</th>
                                <td>{{$record->spot}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article.content')}}</th>
                                <td>{!! $record->content !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article.description')}}</th>
                                <td>{{$record->description}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article.keywords')}}</th>
                                <td>{{$record->keywords}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article.order')}}</th>
                                <td>{{$record->order}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article.status')}}</th>
                                <td>{!!$record->status ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article.is_cuff')}}</th>
                                <td>{!!$record->is_cuff ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article.is_active')}}</th>
                                <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer-->
            </div>
        </div>
    </div>
@endsection
@section('css')

@stop
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('articles', 'article_management');
    </script>
@endpush

