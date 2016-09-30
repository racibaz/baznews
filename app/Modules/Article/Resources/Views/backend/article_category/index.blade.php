@extends($activeTheme .'::backend.master')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('article_category.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('common.create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('article_category.managment')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials.tree',$recordsTree)

                    <table id="countries" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('article_category.name')}}</th>
                            <th>{{trans('article_category.parent_id')}}</th>
                            <th>{{trans('article_category.hit')}}</th>
                            <th>{{trans('article_category.is_cuff')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('article_category.show', $record->name , $record, [] ) !!}</td>
                                    <td> {{$record->parent_id}} </td>
                                    <td> {{$record->hit}} </td>
                                    <td> {{$record->is_cuff}} </td>
                                    <td>{!!$record->is_active ? '<label class="badge badge-green">' . trans('common.active') . '</label>' : '<label class="badge badge-brown">' . trans('common.passive') . '</label>'!!}</td>
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
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>{{trans('article_category.name')}}</th>
                            <th>{{trans('article_category.parent_id')}}</th>
                            <th>{{trans('article_category.hit')}}</th>
                            <th>{{trans('article_category.is_cuff')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                        </tr>
                        </tfoot>
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