@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('success_messages'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>{{ Session::get('success_messages') }}!</strong>
    </div>
@endif
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>{{ Session::get('flash_message') }}!</strong>
    </div>

@endif
@if(Session::has('error_message'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>{{ Session::get('error_message') }}!</strong>
    </div>
@endif