<div class="widget">
    <div class="title-section">
        <h1>
            <span>{{trans('news::news.news_archive')}}</span>
        </h1>
    </div>

    {!! Form::open(['route' => 'archive_index','method' => 'get']) !!}
    <div class="archive-widget module">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('days', trans('news::archive.day'),['class'=> 'control-label']) !!}
                    {!! Form::selectRange('days', 1, 31,1,['class'=>'form-control']) !!}
                </div>
            </div><!-- /.col -->
            <div class="col-md-5">
                <div class="form-group">
                    {!! Form::label('months', trans('news::archive.month'),['class'=> 'control-label']) !!}
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
            </div><!-- /.col -->
            <div class="col-md-5">
                <div class="form-group">
                    {!! Form::label('years', trans('news::archive.year'),['class'=> 'control-label']) !!}
                    <select id="years" name="years" class="form-control">
                        @for ($i = $nowYear; $i >= $subYears; $i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <button class="btn btn-success btn-block" type="submit"><i
                                class="fa fa-search"></i> {{trans('common.search')}}</button>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.archive-widget -->
    {!! Form::close() !!}
</div>

