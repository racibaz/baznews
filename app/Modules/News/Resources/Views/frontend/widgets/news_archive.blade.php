<div class="widget">
    <div class="title-section">
        <h1>
            <span>{{trans('news::news.news_archive')}}</span>
        </h1>
    </div>

    {!! Form::open(['route' => 'archive_index','method' => 'get']) !!}
    <div class="archive-widget module">
        {{--<div class="form-group">--}}
        {{--<div class="row">--}}
        {{--{!! Form::label('news_category', trans('news::news.selected_all_categories'),['class'=> 'col-lg-2 control-label']) !!}--}}

        {{--<div class="col-lg-10">--}}
        {{--{!! Form::select('news_category', $newsCategoryList , null , ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control']) !!}--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

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
            </div><!-- /.col -->
            <div class="col-md-5">
                <div class="form-group">
                    {!! Form::label('years', trans('news::archive.year'),['class'=> 'control-label']) !!}
                    {{--{!! Form::text('years', null,['class'=> 'col-lg-2 control-label']) !!}--}}
                    <select id="years" name="years" class="form-control">
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                    </select>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <button class="btn btn-success btn-block" type="submit"><i class="fa fa-search"></i> {{trans('news::common.search')}}</button>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.archive-widget -->
    {!! Form::close() !!}
</div>

