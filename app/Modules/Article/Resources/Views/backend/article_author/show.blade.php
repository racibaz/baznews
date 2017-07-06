@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('article::article.management')}}
            <small>{{$record->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('article_author.index') !!}">{{trans('article::article.management')}}</a></li>
            <li class="active">{{$record->name}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->name}}</h3>

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
                                <th width="20%">{{trans('article::article_author.name')}}:</th>
                                <td>{{$record->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article_author.slug')}}:</th>
                                <td>{{$record->slug}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article_author.email')}}:</th>
                                <td>{{$record->email}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article_author.cv')}}:</th>
                                <td>{!! $record->cv !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article_author.photo')}}:</th>
                                <td>
                                    <img src="{{ asset('images/article_author_images/' . $record->id . '/original/' . $record->photo)}}"
                                         alt="{{$record->name}}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article_author.description')}}:</th>
                                <td>{{$record->description}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article_author.keywords')}}:</th>
                                <td>{{$record->keywords}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article_author.is_quotation')}}:</th>
                                <td>{!!$record->is_quotation ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article_author.is_cuff')}}:</th>
                                <td>{!!$record->is_cuff ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('article::article_author.is_active')}}:</th>
                                <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
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
@section('css')

@stop
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('authors', 'article_management');
    </script>
@stop
