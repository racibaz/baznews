<div class="col-sm-4">
    <div aria-live="polite" role="status" id="example1_info" class="dataTables_info">
        {{trans('common.pagination',['total' => $records->total(),'count' => $records->count()])}}
    </div>
</div>
<div class="col-sm-4">{!! $records->render() !!}</div>