<ul class="timeline">

@foreach($rivisions as $history)
    <!-- timeline time label -->
        <li class="time-label">
        <span class="bg-red">
            {{$history->updated_at}}
        </span>
        </li>
        <!-- /.timeline-label -->

        <!-- timeline item -->
        <li>
            <!-- timeline icon -->
            <i class="fa fa-globe bg-blue"></i>
            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> {{$history->updated_at}}</span>

                <h3 class="timeline-header">{{ $history->userResponsible()->first_name }}</h3>

                <div class="timeline-body">
                    <h3>Değiştirilen Form Alanı -> {{ $history->fieldName() }} </h3>
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">Eski İçerik</h3>
                        </div>
                        <div class="change-content">
                            {!! $history->oldValue()  !!}
                        </div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Yeni İçerik</h3>
                        </div>
                        <div class="change-content">
                            {!! $history->newValue()  !!}
                        </div>
                    </div>
                </div>

                {{--<div class="timeline-footer">--}}
                {{--<a class="btn btn-primary btn-xs">...</a>--}}
                {{--</div>--}}
            </div>
        </li>
        <!-- END timeline item -->
    @endforeach
</ul>
{{--@foreach($rivisions as $history)--}}
{{--@if($history->key == 'created_at' && !$history->old_value)--}}
{{--<li>{{ $history->userResponsible()->first_name }} created this resource at {{ $history->newValue() }}</li>--}}
{{--@else--}}
{{--<li>{{ $history->userResponsible()->first_name }} changed {{ $history->fieldName() }} from {{ $history->oldValue() }} to {{ $history->newValue() }}</li>--}}
{{--@endif--}}
{{--@endforeach--}}