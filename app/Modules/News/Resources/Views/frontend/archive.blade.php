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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            {{--{!! Form::text('years', null,['class'=> 'col-lg-2 control-label']) !!}--}}
                                            {!! Form::label('years', trans('news::archive.year'),['class'=> 'control-label']) !!}
                                            <select id="years" name="years" class="form-control">
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('months', trans('news::archive.month'),['class'=> 'control-label']) !!}
                                            <select id="months" name="months" class="form-control">
                                                <option value="1">{{trans('news::setting.january')}}</option>
                                                <option value="2">{{trans('news::setting.february')}}</option>
                                                <option value="3">{{trans('news::setting.march')}}</option>
                                                <option value="4">{{trans('news::setting.may')}}</option>
                                                <option value="5">{{trans('news::setting.april')}}</option>
                                                <option value="6">{{trans('news::setting.june')}}</option>
                                                <option value="7">{{trans('news::setting.july')}}</option>
                                                <option value="8">{{trans('news::setting.august')}}</option>
                                                <option value="9">{{trans('news::setting.september')}}</option>
                                                <option value="10">{{trans('news::setting.october')}}</option>
                                                <option value="11">{{trans('news::setting.november')}}</option>
                                                <option value="12">{{trans('news::setting.december')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button class="btn btn-success btn-block" type="submit"
                                                    style="margin-top: 25px;"><i
                                                        class="fa fa-search"></i> {{trans('news::common.search')}}
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
                                            <th>{{trans('news::news.hit')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($records as $index => $record)
                                            <tr>
                                                <td>{{$index++}}</td>
                                                <!-- TODO : Haberin resmine link verilmeli.. -->
                                                <td>
                                                    <img src="{{asset('images/news_images/' . $record->id . '/thumbnail/' .$record->thumbnail)}}"
                                                         width="100px" alt="{{$record->title}}"></td>
                                                <td>{!! link_to_route('news.show', $record->title , $record, [] ) !!}</td>
                                                <td width="50%"><span
                                                            style="display: block;max-height:20px;overflow: hidden;">{!! link_to_route('news.show', $record->spot , $record, [] ) !!}</span>
                                                </td>
                                                <td> {{$record->hit}} </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $tags->links() }}
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

@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script>
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
    </script>
@endsection