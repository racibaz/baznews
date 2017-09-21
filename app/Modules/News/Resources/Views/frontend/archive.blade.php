@extends($activeTheme . '::frontend.master')

@section('content')

    <article class="container" id="container">
        <div class="row">
            <div class="col-md-8" id="content">
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title-section">
                                <h1>
                                    <span>
                                        @if($datetime){{$datetime->formatLocalized('%A %d %B %Y') }}@endif
                                    </span>
                                </h1>
                            </div><!-- /.title-section -->
                            <div class="archive-search-form module">
                                {!! Form::open(['route' => 'archive_index','method' => 'get']) !!}
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            {!! Form::label('days', trans('news::archive.day'),['class'=> 'control-label']) !!}
                                            {!! Form::selectRange('days', 1, 31,1,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('months', trans('news::archive.month'),['class'=> 'form-label']) !!}

                                            {!! Form::select('months', [
                                            '1' => trans('news::setting.january'),
                                            '2' => trans('news::setting.february'),
                                            '3' => trans('news::setting.march'),
                                            '4' => trans('news::setting.april'),
                                            '5' => trans('news::setting.may'),
                                            '6' => trans('news::setting.june'),
                                            '7' => trans('news::setting.july'),
                                            '8' => trans('news::setting.august'),
                                            '9' => trans('news::setting.september'),
                                            '10' => trans('news::setting.october'),
                                            '11' => trans('news::setting.november'),
                                            '12' => trans('news::setting.december'),
                                            ],
                                            null,
                                            ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            {!! Form::label('years', trans('news::archive.year'),['class'=> 'control-label']) !!}
                                            <select id="years" name="years" class="form-control">
                                                @for ($i = $nowYear; $i >= $subYears; $i--)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button class="btn btn-success btn-block" type="submit"
                                                    style="margin-top: 25px;"><i
                                                        class="fa fa-search"></i> {{trans('common.search')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div><!-- /.archşve-search -->

                            <div class="tags-box">
                                @foreach($tags as $tag)
                                    <a href="{!! route('tag_search',['q' => $tag->name]) !!}">{{$tag->name}}</a>
                                @endforeach
                            </div><!-- /.tag-box -->
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->


                    @if(isset($records))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="title-section">
                                    <h2>
                                        <span>{{trans('news::news.archive_news')}}</span>
                                    </h2>
                                </div><!-- /.title-section -->
                                <div class="archive-news-list module">
                                    <table id="countries" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('news::news.image')}}</th>
                                            <th>{{trans('news::news.title')}}</th>
                                            <th>{{trans('news::news.spot')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($records as $index => $record)
                                            <tr>
                                                <td>{{++$index}}</td>
                                                <td>
                                                    <a href="{!! route('show_news', ['slug' => $record->slug]) !!}">
                                                        <img src="{{asset('images/news_images/' . $record->id . '/thumbnail/' .$record->thumbnail)}}"
                                                             width="100px" alt="{{$record->title}}">
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="{!! route('show_news', ['slug' => $record->slug]) !!}"> {{$record->title}}</a>
                                                </td>
                                                <td width="50%">
                                                    <span style="display: block;max-height:20px;overflow: hidden;">
                                                        <a href="{!! route('show_news', ['slug' => $record->slug]) !!}"> {{$record->spot}}</a>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                                    {!! $tags->links() !!}
                                </div><!-- /.archive-news -->
                            </div><!-- /.col -->
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4" id="sidebar">
                <div class="sidebar">
                    <div class="widget">
                        @foreach($widgets as $widget)
                            @widget($widget['namespace'])
                            <br/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article><!-- /.article -->
@endsection

@section('meta_tags')
    <title>
        {{Cache::tags('Setting')->get('url')}}
        @if($datetime){{$datetime->formatLocalized('%A %d %B %Y') }}@endif
    </title>
@endsection

@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script>
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
    </script>
@endpush