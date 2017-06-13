@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::news_category.management')}}
            <small>{{trans('news::news_category.list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('news_category.index') !!}">{{trans('news::news_category.management')}}</a></li>
            <li class="active">{{trans('news::news_category.list')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('news_category.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('news::news_category.create') }}
                </a>
            </div>
            <div class="box box-solid">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('news::news_category.list')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials.tree',$recordsTree)
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <div class="table-responsive">
                        <table id="news_category" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('news::news_category.name')}}</th>
                                <th>{{trans('news::news_category.parent_id')}}</th>
                                <th>{{trans('news::news_category.news_count')}}</th>
                                <th>{{trans('news::news_category.hit')}}</th>
                                <th>{{trans('news::news_category.is_cuff')}}</th>
                                <th>{{trans('news::news_category.is_active')}}</th>
                                <th>{{trans('news::news_category.edit_delete')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('news_category.show', $record->name , $record, [] ) !!}</td>
                                    <td>
                                        @if($record->parent)
                                            {{$record->parent->name}}
                                        @endif
                                    </td>
                                    <td> {{$record->news->count()}} </td>
                                    <td> {{$record->hit}} </td>
                                    <td>{!!$record->is_cuff ? '<label class="badge bg-green"><i class="fa fa-check"></i></label>' : '<label class="badge bg-brown"><i class="fa fa-times"></i></label>'!!} </td>
                                    <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                    <td>
                                        <div class="btn-group">
                                            {!! link_to_route('show_news_category', trans('common.show'), $record->slug, ['target' => '_blank', 'class' => 'btn btn-info btn-xs'] ) !!}
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('news_category.destroy',  $record))) !!}
                                            {!! link_to_route('news_category.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
                                            {!! Form::submit('Sil', ['class' => 'btn btn-danger btn-xs','data-toggle'=>'confirmation']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
        activeMenu('news_management','news_category');
    </script>
@endsection