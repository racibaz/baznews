

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
                changed {{ $history->fieldName() }} from {{ $history->oldValue() }} to {{ $history->newValue() }}
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