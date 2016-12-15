@extends($activeTheme . '::frontend.master')

@section('content')



    <article class="container" id="container">
        <div class="breadcrumbs">
            <p><a href="{!! route('index') !!}">{{trans('news.common')}}</a></p>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div id="new-content">
                    <div class="content" id="content">

                        @foreach($records as $record)
                            <h1 class="ct-title">
                                <a href="{!! route('show_news', ['slug' => $record->slug]) !!}">{{$record->title}}</a>
                            </h1>
                            {{$record->slug}}<br />
                            {{$record->keywords}}<br />
                            {{$record->description}}<br />
                        @endforeach
                    </div><!-- /.content -->
                </div><!-- /.new-content -->
            </div><!-- /.col-md-8 -->
            <div class="col-md-4">
                <div class="sidebar">
                    @foreach($widgets as $widget)
                        @widget($widget['namespace'])
                        <br />
                    @endforeach
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->

    </article><!-- /.article -->


@endsection

@section('meta_tags')
    <title>{{ $newsCategory->name }}</title>
    <meta name="keywords" content="{{$newsCategory->keywords}}"/>
    <meta name="description" content="{{$newsCategory->description}}"/>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='pagename' content='{{$newsCategory->title}}'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>
@endsection
