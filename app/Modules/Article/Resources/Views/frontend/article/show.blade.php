@extends($activeTheme . '::frontend.master')

@section('content')


    <div class="container" id="container">
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('index') !!}">{{trans('common.homepage')}}</a>
            </li>
            @foreach($record->article_categories as $articleCategory)
                <li>
                    <a href="{!! route('article_category', ['slug' => $articleCategory->slug]) !!}">
                        {{$articleCategory->name}}
                    </a>
                </li>
            @endforeach
            <li>
                {{$record->title}}
            </li>
        </ol>
        <div class="row">
            <div class="col-md-8" id="content">
                <article class="article article-section module">

                    <div class="article-head">
                        <div class="author-img">
                            <a href="{!! route('article_author', ['slug' => $record->article_author->slug]) !!}"
                               title="{{$record->name}}">
                                <img src="{{asset($authorPhoto)}}" class="img-circle" width="58" height="58">
                            </a>
                        </div>
                        <div class="article-detail">
                            <div class="author-name">
                                <a href="{!! route('article_author', ['slug' => $record->article_author->slug]) !!}">
                                    <h2>{{$record->article_author->name}}</h2>
                                </a>
                            </div>
                            <div class="article-title">
                                <a href="#">
                                    <h1>{{$record->title}}</h1>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="article-content">
                        {!! $record->content !!}
                    </div>
                </article>

                @include($activeTheme . '::frontend.partials._share')

                <div class="other-article">
                    <div class="title-section">
                        <h2>
                            <span>Diğer Makaleler</span>
                        </h2>
                    </div>
                    <div class="module">
                        <ul class="article-list">
                            @foreach($otherArticles as $article)
                                <li>
                                    <div class="title pull-left">
                                        <a href="{!! route('article', ['slug' => $article->slug]) !!}">
                                            <span>{{$article->title}}</span>
                                        </a>
                                    </div>
                                    <div class="time pull-right">
                                        <a href="{!! route('article', ['slug' => $article->slug]) !!}">
                                            <i class="fa fa-clock-o"></i>
                                            <span>{{$article->created_at->diffForHumans()}}</span>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div><!-- /.new-content -->
            <div class="col-md-4" id="sidebar">
                <div class="sidebar">
                    @foreach($widgets as $widget)
                        @widget($widget['namespace'])
                    @endforeach
                    {{--@widgetGroup('right_bar')--}}
                </div><!-- /.sidebar -->
            </div><!-- /.col -->
        </div><!-- /.col-md-8 -->
    </div><!-- /.row -->

    {{--<div class="fb-comment-embed" data-href="{{url($record->slug)}}" data-width="560" data-include-parent="false"></div>--}}
@endsection


@section('meta_tags')
    <title> {{ $record->title }}  </title>
    <meta name="keywords" content="{{$record->keywords}}"/>
    <meta name="description" content="{{$record->description}}"/>
    <meta name='robots' content='index,follow'>

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{Cache::tags('Setting')->get('twitter_account')}}">
    <meta name="twitter:title" content="{{$record->title}}">
    <meta name="twitter:description" content="{{$record->description}}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $record->title }} "/>
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:description" content="{{$record->description}}"/>
    <meta property="fb:app_id" content="{{Cache::tags('Setting')->get('FACEBOOK_CLIENT_ID')}}">
    <meta property="og:image" content="{{asset('images/books/' . $record->id . '/original/' .$record->thumbnail)}}"/>
    <meta property="article:published_time" content="{{$record->created_at}}">
    <meta property="article:author" content="">
@endsection
@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script type="text/javascript">

        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
    </script>
@endpush
