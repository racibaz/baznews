@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('book::book_author.management')}}
            <small>{{$record->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('book_author.index') !!}">{{trans('book::book_author.management')}}</a></li>
            <li class="active">{{$record->name}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->name}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                            <tr>
                                <th>{{trans('book::book_author.name')}}</th>
                                <td>{{$record->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book_author.slug')}}</th>
                                <td>{{$record->slug}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book_author.link')}}</th>
                                <td>{{$record->link}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book_author.thumbnail')}}</th>
                                <td>
                                    <img src="{{ asset('images/book_authors/' . $record->id . '/' . $record->thumbnail)}}"
                                         alt="{{$record->name}}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book_author.bio_note')}}</th>
                                <td>{!! $record->bio_note !!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('common.is_cuff')}}</th>
                                <td>{!!$record->cuff ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('common.is_active')}}</th>
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
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('book_authors', 'book_management');
    </script>
@endpush
