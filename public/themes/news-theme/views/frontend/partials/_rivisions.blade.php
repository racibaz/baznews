@foreach($rivisions as $history )
    <li>{{ $history->userResponsible()->first_name }} changed {{ $history->fieldName() }} from {{ $history->oldValue() }} to {{ $history->newValue() }}</li>
@endforeach


{{--@foreach($rivisions as $history)--}}
    {{--@if($history->key == 'created_at' && !$history->old_value)--}}
        {{--<li>{{ $history->userResponsible()->first_name }} created this resource at {{ $history->newValue() }}</li>--}}
    {{--@else--}}
        {{--<li>{{ $history->userResponsible()->first_name }} changed {{ $history->fieldName() }} from {{ $history->oldValue() }} to {{ $history->newValue() }}</li>--}}
    {{--@endif--}}
{{--@endforeach--}}