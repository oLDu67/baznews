@extends($activeTheme . '::frontend.master')

@section('content')
    <article>
        <div class="container" id="container">
            <ol class="breadcrumb">
                <li>
                    <a href="{!! route('index') !!}">{{trans('common.homepage')}}</a>
                </li>
                <li>
                    <a href="{!! route('show_video_gallery', ['slug' => $videoGallery->slug]) !!}">
                        {{$videoGallery->title}}
                    </a>
                </li>
                <li>
                    {{$video->name}}
                </li>
            </ol>
            <div class="row">
                <div class="col-md-8">
                    <div id="new-content">
                        <div class="playerbox module">

                            <div class="player">

                                @if(!empty($video->file))
                                    <video id="{{$video->id}}"
                                           class="video-js vjs-default-skin"
                                           controls preload="auto" width="100%" height="400px"
                                           poster="http://video-js.zencoder.com/oceans-clip.png"
                                           data-setup='{"example_option":true}'>

                                        <source src="{{asset('video_gallery/' . $videoGallery->id . '/videos/' . $video->file)}}"
                                                type="video/mp4"/>
                                        <source src="{{asset('video_gallery/' . $videoGallery->id . '/videos/' . $video->file)}}"
                                                type="video/webm"/>
                                        <source src="{{asset('video_gallery/' . $videoGallery->id . '/videos/' . $video->file)}}"
                                                type="video/ogg"/>

                                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider
                                            upgrading to a web browser that <a
                                                    href="http://videojs.com/html5-video-support/" target="_blank">supports
                                                HTML5 video</a></p>
                                    </video>

                                    <script type="application/ld+json">
                                        {
                                          "@context": "http://schema.org",
                                          "@type": "VideoObject",
                                          "name": "{{$video->title}}",
                                          "description": "{{$video->description}}",
                                          "thumbnailUrl": "{{ asset('videos/' . $video->id. '/' . $video->thumbnail) }}",
                                          "uploadDate": "{{$video->updated_at}}",
                                          "publisher": {
                                            "@type": "Organization",
                                            "name": "{{Cache::tags('Setting')->get('url')}}",
                                            "logo": {
                                              "@type": "ImageObject",
                                              "url": "{{Cache::tags('Setting')->get('logo')}}"
                                            }
                                          },
                                          "contentUrl": "https://www.example.com/video123.flv",
                                          "embedUrl": "https://www.example.com/videoplayer.swf?video=123",
                                          "interactionCount": "2347"
                                        }

                                    </script>

                                @elseif(!empty($video->embed))
                                    {!! $video->embed !!}
                                @endif

                            </div>

                            <div class="description">
                                <em>{{$videoGallery->title}} / {{$video->updated_at->diffForHumans()}}</em>
                                <h1>{{$video->name}}</h1>
                                <h2>{{$video->content}}</h2>
                                @foreach($tags as $tag)
                                    <a href="{!! route('tag_search',['q' => $tag->name]) !!}">{{$tag->name}}</a>
                                @endforeach
                            </div>
                        </div>
                        @include($activeTheme . '::frontend.partials._share')
                    </div><!-- /.new-content -->
                </div><!-- /.col-md-8 -->
                <div class="col-md-4">
                    <div class="sidebar">

                        <div class="sidebar-video">
                            <div class="title-section">
                                <h1>
                                    <span>{{trans('news::video_gallery.gallery_other_videos')}}</span>
                                </h1>
                            </div>

                            <div class="video-list-body">
                                @foreach($otherGalleryVideos as $otherGalleryVideo)
                                    <div class="video-link module">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <a href="{{route('show_videos',['slug' => $otherGalleryVideo->slug ])}}">
                                                    <div class="hold">
                                                        <img src="{{ asset('videos/' . $otherGalleryVideo->id . '/165x90_' . $otherGalleryVideo->thumbnail)}}"
                                                             alt="{{$otherGalleryVideo->title}}"
                                                             title="{{$otherGalleryVideo->title}}"/>
                                                        <span class="icon play"></span>
                                                    </div>
                                                </a>
                                            </div><!-- /.col -->
                                            <div class="col-lg-9">
                                                <a href="{{route('show_videos',['slug' => $otherGalleryVideo->slug ])}}">
                                                    <span class="title">{{$otherGalleryVideo->name}}</span>
                                                    <span class="excerpt">
                                                        <p>{{$otherGalleryVideo->subtitle}}</p>
                                                    </span>
                                                </a>
                                                <span class="time visible-lg"> {{$otherGalleryVideo->updated_at->diffForHumans()}}</span>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.video-link -->
                                @endforeach
                            </div>
                        </div><!-- /.sidebar-video -->
                        <div class="widget">
                            @foreach($widgets as $widget)
                                @widget($widget['namespace'])
                            @endforeach
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="videos">
                <div class="title-section">
                    <h1>
                        <span>{{trans('news::video_gallery.gallery_other_videos')}}</span>
                    </h1>
                </div><!-- /.title-section -->
                <div class="row">
                    @foreach($galleryVideos as $galleryVideo)
                        <div class="col-md-2 col-sm-4 col-xs-6">
                            <div class="r-box module">
                                <div class="box-img">
                                    <a href="{{route('show_video_gallery',['slug' => $galleryVideo->slug ])}}">
                                        <img src="{{ asset('videos/' . $galleryVideo->id . '/497x358_' . $galleryVideo->thumbnail)}}"
                                             alt="{{$galleryVideo->name}}" title="{{$galleryVideo->name}}"/>
                                        <span class="icon"></span>
                                    </a>
                                </div>
                                <div class="img-title">
                                    <a href="{{route('show_video_gallery',['slug' => $galleryVideo->slug ])}}">
                                        {{$galleryVideo->name}}
                                    </a>
                                </div>
                            </div><!-- /.r-box -->
                        </div><!-- /.col -->
                    @endforeach
                </div><!-- /.row -->
            </div><!-- /.related-videos -->
            <div class="videos">
                <div class="title-section">
                    <h1>
                        <span>{{trans('news::video_category.category_latest_videos')}}</span>
                    </h1>
                </div><!-- /.title-section -->
                <div class="row">
                    @foreach($lastestVideos  as $lastestVideo)
                        <div class="col-md-2 col-sm-4 col-xs-6">
                            <div class="r-box module">
                                <div class="box-img">
                                    <a href="{{route('show_videos',['slug' => $lastestVideo->slug ])}}">
                                        <img src="{{ asset('videos/' . $lastestVideo->id . '/497x358_' . $lastestVideo->thumbnail)}}"
                                             alt="{{$lastestVideo->title}}" title="{{$lastestVideo->title}}"/>
                                        <span class="icon"></span>
                                    </a>
                                </div>
                                <div class="img-title">
                                    <a href="{{route('show_videos',['slug' => $lastestVideo->slug ])}}">
                                        {{$lastestVideo->name}}
                                    </a>
                                </div>
                            </div><!-- /.r-box -->
                        </div><!-- /. -->
                    @endforeach
                    <div class="clearfix"></div>
                </div><!-- /.row -->
            </div><!-- /.videos -->
        </div>
    </article><!-- /.article -->

@endsection


@section('meta_tags')
    <title> {{ $videoGallery->title }}  </title>
    <meta name="keywords" content="{{$videoGallery->keywords}}"/>
    <meta name="description" content="{{$videoGallery->description}}"/>
    <meta name='subtitle' content='This is my subtitle'>
    <meta name='pagename' content='{{$videoGallery->title}}'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name='directory' content='submission'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='subject' content='your website s subject'>
    <meta name='abstract' content=''>
    <meta name='topic' content=''>
    <meta name='summary' content=''>

@endsection


@section('css')
    <link href="{{ asset($themeAssetsPath . 'js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}"
          type="text/css" rel="stylesheet">
@endsection

@push('js')

    <script src="{{ asset($themeAssetsPath . 'js/video-js/video.novtt.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/video-js/video.js') }}"></script>

    <script>
        videojs.options.flash.swf = "{{ asset($themeAssetsPath . 'js/video-js/video-js.swf') }}"
        videojs("video-js", {}, function () {
            // Player (this) is initialized and ready.
        });
    </script>
    <script src="{{ asset($themeAssetsPath . 'js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            /*--------------------------------------------------------
             mCustomScrollbar
             * --------------------------------------------------------*/
            $('.sidebar-video .video-list-body').mCustomScrollbar({
                theme: "rounded-dark"
            });
        });
    </script>

@endpush
