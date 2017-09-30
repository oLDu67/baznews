<!DOCTYPE html>
<html>
    <head>
        <title>Be right back.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/error.css">
    </head>
    <body>
        <div class="content-w3">
            <h1>Go right back</h1>
            <h2>{{$message}}</h2>
            <p>
                <span> <a href="{{route('index')}}" class="back-button">{{trans('common.homepage')}}</a></span>
            </p>
        </div>
    </body>
</html>
