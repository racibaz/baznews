<div class="pull-left">
    <span><b>{{trans('common.all_records')}}</b></span>{{$records->total()}}
    <span><b>{{trans('common.list_records')}}</b></span>{{$records->count()}}
</div>
<div class="pull-right">
    {!! $records->render() !!}
</div>

