@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('article::article_category.management')}}
            <small>{{trans('article::article_category.list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('article_category.index') !!}">{{trans('article::article_category.management')}}</a></li>
            <li class="active">{{trans('article::article_category.list')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('article_category.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('article::article_category.create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('article::article_category.management')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials.tree',$recordsTree)
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table id="article_categories" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('article::article_category.name')}}</th>
                            <th>{{trans('article::article_category.parent')}}</th>
                            {{--<th>{{trans('article::article_category.hit')}}</th>--}}
                            <th>{{trans('article::article_category.is_cuff')}}</th>
                            <th>{{trans('article::article_category.is_active')}}</th>
                            <th>{{trans('article::article_category.edit_delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('article_category.show', $record->name , $record, [] ) !!}</td>
                                    <td>
                                        @if($record->parent)
                                            {{$record->parent->name}}
                                        @endif
                                    </td>
                                    {{--<td> {{$record->hit}} </td>--}}
                                    <td>{!!$record->is_cuff ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                    <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                    <td>
                                        <div class="btn-group">
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('article_category.destroy',  $record))) !!}

                                            {!! link_to_route('article_category.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}


                                            {!! Form::submit('Sil', ['class' => 'btn btn-danger btn-xs','data-toggle'=>'confirmation']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        //active menu
        activeMenu('article_categories','article_management');
    </script>
@endsection