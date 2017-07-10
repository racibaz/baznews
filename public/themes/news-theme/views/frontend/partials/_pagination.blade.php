<div class="row">
    <div class="col-lg-12">
        <div class="number-box pull-left">
            <div class="mini-box">
                <h3 class="title">
                    {{trans('common.all_records')}} :
                    <span class="label label-info">{{$records->total()}}</span>
                </h3>
            </div>
            <div class="mini-box">
                <h3 class="title">
                    {{trans('common.list_records')}} :
                    <span class="label label-info">{{$records->count()}}</span>
                </h3>
            </div>
        </div>
        <div class="pull-right">
            {!! $records->render() !!}
        </div>
    </div>
</div>
