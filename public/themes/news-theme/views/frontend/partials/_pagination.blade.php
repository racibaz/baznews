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
<style type="text/css">
    .number-box {
        margin: 10px 0;
    }
    .number-box .mini-box {
        float: left;
        height: 34px;
        padding: 8px 13px;
        border-bottom: 1px solid #ccc;
        margin-right: 15px;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
    }

    .number-box .mini-box h3.title {
        margin: 0;
        font-size: 12px;
    }

    .number-box .mini-box h3.title span {
        font-size: 12px;
    }

    .number-box .mini-box h3.title .label-info{
        background-color: #f44336;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
    }

    .table {
        margin: 0;
    }
</style>
