@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('book::book_publisher.management')}}
            <small>{{$record->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('book_publisher.index') !!}">{{trans('book::book_publisher.management')}}</a>
            </li>
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

                            {{--<tr>--}}
                            {{--<th>{{trans('book::book_publisher.user_id')}}</th>--}}
                            {{--<td>{{$record->user_id}}</td>--}}
                            {{--</tr>--}}
                            <tr>
                                <th width="20%">{{trans('book::book_publisher.name')}}</th>
                                <td>{{$record->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book_publisher.slug')}}</th>
                                <td>{{$record->slug}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book_publisher.link')}}</th>
                                <td>{{$record->link}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book_publisher.description')}}</th>
                                <td>{{$record->description}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book_publisher.is_active')}}</th>
                                <td>{{$record->is_active}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book_publisher.created_at')}}</th>
                                <td>{{$record->created_at}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('book::book_publisher.updated_at')}}</th>
                                <td>{{$record->updated_at}}</td>
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
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('book_publishers', 'book_management');
    </script>
@endsection
