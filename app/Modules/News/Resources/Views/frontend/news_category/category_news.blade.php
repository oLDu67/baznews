@extends($activeTheme . '::frontend.master')

@section('content')

    <article class="container" id="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ticker last-time" id="son-dakika">
                    <strong>Son Dakika:</strong>
                    <ul>
                        <li>
                            <a href="#">Breaking News 1</a>
                        </li>
                        <li>
                            <a href="#">Breaking News 2</a>
                        </li>
                        <li>
                            <a href="#">Breaking News 3</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="cat-posts">
                    <div class="title-section">
                        <h1>
                            <span>{{$newsCategory->name}}</span>
                        </h1>
                    </div><!-- /.title-section -->
                    <div class="posts">
                        <div class="row">
                            @foreach($records as $record)
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="r-box">
                                        <a href="{{ route('show_news', ['slug' => $record->slug]) }}" class="module">
                                            <img src="{{asset('images/news_images/' . $record->id . '/165x90_' . $record->thumbnail)}}" alt="{{$record->title}}">
                                            <div class="c-text">
                                                <h6 class="title">{{$record->title}}</h6>
                                            </div>
                                        </a>
                                    </div><!-- /.r-box -->
                                </div><!-- /. -->
                            @endforeach
                        </div><!-- /.row -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="widget">
                        @foreach($widgets as $widget)
                            @widget($widget['namespace'])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection

@section('meta_tags')
    <title>{{ $newsCategory->name }}</title>
    <meta name="keywords" content="{{$newsCategory->keywords}}"/>
    <meta name="description" content="{{$newsCategory->description}}"/>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='pagename' content='{{$newsCategory->title}}'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>
@endsection
@section('css')
{{--Css code--}}
@endsection
@section('js')
    <script src="{{ Theme::asset($activeTheme . '::js/jquery-ticker-master/jquery.ticker.min.js') }}"></script>
    <script type="text/javascript">
        (function($) {
            'use strict';

            /*--------------------------------------------------------
             Last Minute News Ticker Slider
             * --------------------------------------------------------*/
            $('.ticker').ticker();

        })(jQuery);
    </script>
@endsection
