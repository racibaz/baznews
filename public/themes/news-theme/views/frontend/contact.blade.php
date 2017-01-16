@extends($activeTheme . '::frontend.master')

@section('content')


    <article class="container" id="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="contact-form" style="padding: 15px;">
                    <form action="{{route('contact-store')}}" method="post" role="form">
                        {{Form::token()}}

                        <legend>{{trans('contact.contact_form')}}</legend>

                        <div class="form-group">
                            <label for="contact_type_id">{{trans('contact.contact_type_id')}}</label>
                            {!! Form::select('contact_type_id', $contactTypeList , null , ['placeholder' => trans('common.please_choose'),'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="full_name">{{trans('contact.full_name')}}</label>
                            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="{{trans('contact.full_name')}}...">
                        </div>

                        <div class="form-group">
                            <label for="mail">{{trans('contact.subject')}}</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="{{trans('contact.subject')}}...">
                        </div>

                        <div class="form-group">
                            <label for="mail">{{trans('contact.email')}}</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="{{trans('contact.email')}}...">
                        </div>

                        <div class="form-group">
                            <label for="phone">{{trans('contact.phone')}}</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="{{trans('contact.phone')}}...">
                        </div>

                        <div class="form-group">
                            <label for="content">{{trans('contact.content')}}</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">{{trans('contact.submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </article><!-- /.article -->
@endsection


@section('meta_tags')
    <title> {{ Redis::get('title') }}  </title>
    <meta name="keywords" content="{{ Redis::get('keywords') }}"/>
    <meta name="description" content="{{ Redis::get('description') }}"/>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='category' content=''>
    <meta name='pagename' content='jQuery Tools, Tutorials and Resources - O Reilly Media'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>
@endsection
