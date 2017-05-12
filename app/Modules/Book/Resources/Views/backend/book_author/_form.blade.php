@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('book::book_author.management')}}
            <small>{{trans('book::book_author.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('book_author.index') !!}">{{trans('book::book_author.management')}}</a></li>
            <li class="active">{{trans('book::book_author.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['book_author.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'book_author.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">{{trans('book::book_author.create_edit')}}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

            <div class="form-group">
                {!! Form::label('name', trans('book::book_author.name'),['class'=> 'control-label']) !!}
                {!! Form::text('name', $record->name, ['placeholder' => trans('book::book_author.name') ,'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('slug', trans('book::book_author.slug'),['class'=> 'control-label']) !!}
                {!! Form::text('slug', $record->name, ['placeholder' => trans('book::book_author.slug') ,'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('link', trans('book::book_author.link'),['class'=> 'control-label']) !!}
                {!! Form::text('link', $record->link, ['placeholder' => trans('book::book_author.link') ,'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('thumbnail', trans('book::book_author.thumbnail'),['class'=> 'control-label']) !!}
                {!! Form::file('thumbnail') !!}
            </div>
            <div class="form-group">
                {!! Form::label('bio_note', trans('book::book_author.bio_note'),['class'=> 'control-label']) !!}
                {!! Form::textarea('bio_note', $record->bio_note, ['placeholder' => trans('book::book_author.bio_note') ,'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>
                    {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                    {{trans('book::common.is_cuff')}}
                </label>
            </div>
            <div class="form-group">
                <label>
                    {!! Form::checkbox('is_active', null , $record->is_active) !!}
                    {{trans('book::common.is_active')}}
                </label>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}
                </button>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

    {!! Form::close() !!}
@endsection
@section('css')

@endsection
@section('js')

@endsection

