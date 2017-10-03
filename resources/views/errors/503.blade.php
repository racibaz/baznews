<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Be right back.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/error.css') }}">
    </head>
    <body>
        <div class="content-w3">
            <h1>Go right back</h1>
            <h2>{{$message}}</h2>
            <p>
                <span> <a href="{{route('index')}}" class="back-button">{{trans('common.homepage')}}</a></span>
                <span> <a href="{{redirect()->back()}}" class="back-button">{{trans('common.redirect_back')}}</a></span>
            </p>
        </div>
    </body>
</html>
