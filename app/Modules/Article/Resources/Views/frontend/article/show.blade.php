@extends($activeTheme . '::frontend.master')

@section('content')


    <div class="container" id="container">
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('index') !!}">{{trans('news.common')}}.</a>
            </li>
            @foreach($record->article_categories as $articleCategory)
                <li>
                    <a href="{!! route('show_news_category', ['slug' => $articleCategory->slug]) !!}">
                        {{$articleCategory->name}}
                    </a>
                </li>
            @endforeach
            <li>
                {{$record->name}}
            </li>
        </ol>
        <div class="row">
            <div class="col-md-8" id="content">
                <article class="article module">

                    <div class="article-head">
                        <div class="author-img">
                            <a href="{!! route('article_author', ['slug' => $record->article_author->slug]) !!}" title="Author Name">
                                <img src="https://placeimg.com/60/60/people/grayscale" alt="Author Name">
                            </a>
                        </div>
                        <div class="article-detail">
                            <div class="author-name">
                                <a href="{!! route('article_author', ['slug' => $record->article_author->slug]) !!}">
                                    <h2>{{$record->article_author->name}}</h2>
                                </a>
                            </div>
                            <div class="article-title">
                                <a href="#">
                                    <h1>{{$record->title}}</h1>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="article-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi assumenda autem dolor
                            doloremque dolores dolorum enim ipsa maxime minima necessitatibus nemo nesciunt quaerat,
                            quam quidem ratione reiciendis veniam voluptatibus!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur, cumque dicta
                            distinctio dolores enim est eveniet explicabo facilis harum hic molestiae nobis officiis
                            quos, soluta tempore vero voluptas, voluptatem!</p>
                    </div>
                    {{--yazarı : <a href="{!! route('book_author', ['slug' => $record->book_author->slug]) !!}">{{$record->book_author->name}}</a>--}}
                    {{--yayıncı : <a href="{!! route('book_publisher', ['slug' => $record->book_publisher->slug]) !!}">{{$record->book_publisher->name}}</a>--}}
                </article>

                <div class="other-article">
                    <div class="title-section">
                        <h2>
                            <span>Diğer Makaleler</span>
                        </h2>
                    </div>
                    <div class="module">
                        <ul class="article-list">
                           <li>
                               <div class="article-title pull-left">
                                   <a href="#">
                                       <span>Makale 1</span>
                                   </a>
                               </div>
                               <div class="time pull-right">
                                   <a href="#">
                                       <i class="fa fa-clock-o"></i>
                                       <span>1 Ocak 2017</span>
                                   </a>
                               </div>
                           </li>
                            <li>
                                <div class="article-title pull-left">
                                    <a href="#">
                                        <span>Makale 1</span>
                                    </a>
                                </div>
                                <div class="time pull-right">
                                    <a href="#">
                                        <i class="fa fa-clock-o"></i>
                                        <span>1 Ocak 2017</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>


            </div><!-- /.new-content -->
            <div class="col-md-4" id="sidebar">
                <div class="sidebar">
                    @foreach($widgets as $widget)
                        @widget($widget['namespace'])
                    @endforeach
                    {{--@widgetGroup('right_bar')--}}
                </div><!-- /.sidebar -->
            </div><!-- /.col -->
        </div><!-- /.col-md-8 -->
    </div><!-- /.row -->

    {{--<div class="fb-comment-embed" data-href="{{Cache::tags('Setting')->get('url')}}/{{$record->slug}}" data-width="560" data-include-parent="false"></div>--}}
@endsection


@section('meta_tags')
    <title> {{ $record->title }}  </title>
    <meta name="keywords" content="{{$record->keywords}}"/>
    <meta name="description" content="{{$record->description}}"/>
    <meta name='robots' content='index,follow'>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{Cache::tags('Setting')->get('twitter_account')}}">
    <meta name="twitter:title" content="{{$record->title}}">
    <meta name="twitter:description" content="{{$record->description}}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $record->title }} " />
    <meta property="og:url" content="{{Cache::tags('Setting')->get('url')}}" />
    <meta property="og:site_name" content="{{Cache::tags('Setting')->get('title')}}" />
    <meta property="og:description" content="{{$record->description}}" />
    <meta property="fb:app_id" content="671303379704288">
    <meta property="og:image" content="{{asset('images/books/' . $record->id . '/original/' .$record->thumbnail)}}"/>
    <meta property="article:published_time" content="{{$record->created_at}}">
    <meta property="article:author" content="">
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script type="text/javascript">

        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function() {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
    </script>
@endsection
