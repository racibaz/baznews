@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('book::book.management')}}
            <small>{{$record->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('book.index') !!}">{{trans('book::book.management')}}</a></li>
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
                                <th width="20%">{{trans('book::book.name')}}</th>
                                <td>{{$record->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book.slug')}}</th>
                                <td>{{$record->slug}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book.short_url')}}</th>
                                <td>{{$record->short_url}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book.link')}}</th>
                                <td>{{$record->link}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book.thumbnail')}}</th>
                                <td>
                                    <img src="{{ asset('images/books/' . $record->id . '/original/' . $record->thumbnail)}}"
                                         alt="{{$record->name}}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book.photo')}}</th>
                                <td>
                                    <img src="{{ asset('images/books/' . $record->id . '/original/' . $record->thumbnail)}}"
                                         alt="{{$record->name}}"/>
                                </td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book.description')}}</th>
                                <td>{{$record->description}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book.ISBN')}}</th>
                                <td>{{$record->ISBN}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book.release_date')}}</th>
                                <td>{{$record->release_date}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book.number_of_print')}}</th>
                                <td>{{$record->number_of_print}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book.skin_type')}}</th>
                                <td>{{$record->skin_type}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book.paper_type')}}</th>
                                <td>{{$record->paper_type}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book.size')}}</th>
                                <td>{{$record->size}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('common.is_cuff')}}</th>
                                <td>{!!$record->is_cuff ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
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
        activeMenu('books', 'book_management');
    </script>
@endpush
