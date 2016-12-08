
<div class="box box-warning box-solid">
    <!-- /.box-header -->
    <div class="box-body">
        <div class="pull-left" style="font-size: 22px;line-height: 0.1em;margin-right: 15px;"><i class="fa fa-bullhorn"></i> <strong>Duyurular: </strong></div>
        <div class="announcement vticker" style="height: 10px;">
            <ul>
                @foreach($announcements as $announcement)
                    <li data-id="{{ $announcement->id }}" style="font-size:14px;">
                        <p>{{ $announcement->title }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- /.box-body -->
</div>