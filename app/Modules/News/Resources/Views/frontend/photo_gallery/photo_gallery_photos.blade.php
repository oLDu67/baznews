@extends($activeTheme . '::frontend.master')
@section('content')
    <article class="container" id="container">
        <div class="image-gallery">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-section">
                        <h1>
                            <span>{{ !empty($photo->subtitle) ? $photo->subtitle : $photo->name}}</span>
                        </h1>
                    </div>
                </div>
                <div class="col-md-8" id="content">
                    <div class="gallery">
                        <div class="text-center module">
                            <ul class="pagination">
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $firstPhoto->slug ])}}">İlk Sayfa</a>
                                </li>
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $previousPhoto->slug ])}}"><i class="fa fa-angle-left"></i></a>
                                </li>
                                @foreach($galleryPhotos as $index => $galleryPhoto)
                                    <li><a href="{{route('show_gallery_photos',['slug' => $galleryPhoto->slug ])}}">{{++$index}}</a></li>
                                @endforeach
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $nextPhoto->slug ])}}"><i class="fa fa-angle-right"></i></a>
                                </li>
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $lastPhoto->slug ])}}">Son Sayfa</a>
                                </li>
                            </ul>
                        </div>
                        <div class="img-container module">
                            <div class="img">
                                <a href="{{route('show_gallery_photos',['slug' => $photo->slug ])}}">
                                    <img src="{{ asset('gallery/' . $photoGallery->id . '/photos/' . $photo->file)}}" alt="{{$photo->name}}" class="img-responsive" />
                                </a>
                            </div>
                            <div class="pager">

                                <a href="{{route('show_gallery_photos',['slug' => $previousPhoto->slug ])}}" class="btn left">
                                    <i class="fa fa-angle-left"></i>
                                </a>

                                <a href="{{route('show_gallery_photos',['slug' => $nextPhoto->slug ])}}" class="btn right">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="text-center module">
                            <ul class="pagination">
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $firstPhoto->slug ])}}">İlk Sayfa</a>
                                </li>
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $previousPhoto->slug ])}}"><i class="fa fa-angle-left"></i></a>
                                </li>
                                @foreach($galleryPhotos as $index => $galleryPhoto)
                                    <li><a href="{{route('show_gallery_photos',['slug' => $galleryPhoto->slug ])}}">{{++$index}}</a></li>
                                @endforeach
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $nextPhoto->slug ])}}"><i class="fa fa-angle-right"></i></a>
                                </li>
                                <li>
                                    <a href="{{route('show_gallery_photos',['slug' => $lastPhoto->slug ])}}">Son Sayfa</a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- /.gallery -->
                    <!-- Tag Box -->
                    <div class="tags-box">
                        @foreach($photoGallery->tags as $tag)
                            <a href="{!! route('tag_search',['q' => $tag->name]) !!}">{{$tag->name}}</a>
                        @endforeach
                    </div>
                    <!-- Other Galleries -->
                    <div class="f-posts">
                        <div class="title-section">
                            <h1>
                                <span>{{trans('news::photo_gallery.other_galleries')}}</span>
                            </h1>
                        </div>
                        <div class="gallery-posts">
                            <div class="row">
                                @foreach($photoCategoryGalleries as $photoCategoryGallery)
                                    <div class="col-md-3">
                                        <div class="r-box module">
                                            <div class="box-img">
                                                <a href="{{route('show_photo_gallery',['slug' => $photoGallery->slug ])}}" class="news">
                                                    <img src="{{ asset('gallery/' . $photoCategoryGallery->id . '/photos/' . $photoCategoryGallery->thumbnail)}}" alt="{{$photoCategoryGallery->name}}" title="{{$photoCategoryGallery->title}}">
                                                </a>
                                            </div>
                                            <div class="img-title">
                                                <a href="{{route('show_photo_gallery',['slug' => $photoCategoryGallery->slug ])}}">
                                                    {{$photoCategoryGallery->title}}
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /.col-->
                                @endforeach
                            </div><!-- /.row -->
                        </div><!-- /.gallery-post -->
                    </div><!-- /.f-posts -->
                </div><!-- /.col -->

                <div class="col-md-4" id="photo_sidebar">
                    <div class="gallery-details module">
                        <div class="gallery-text">
                            <p>{{$photo->content}}</p>
                        </div><!-- /.gallery-text -->
                        <div class="time">
                            <small>
                                <i class="fa fa-clock-o"></i> {{$photo->updated_at}}
                            </small>
                        </div><!-- /.time -->
                    </div><!-- /.gallery-details -->
                    <div class="sidebar">
                        <div class="widget">
                            @foreach($widgets as $widget)
                                @widget($widget['namespace'])
                            @endforeach
                        </div>
                    </div>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </article><!-- /.article -->
@endsection
@section('meta_tags')
    <title> {{ $photoGallery->title }}  </title>
    <meta name="keywords" content="{{$photoGallery->keywords}}"/>
    <meta name="description" content="{{$photoGallery->description}}"/>
@endsection


@section('css')
    <link href="//vjs.zencdn.net/5.8/photo-js.min.css" rel="stylesheet">
    <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">
@endsection

@section('js')
    <script src="js/app.js"></script>

    <script src="http://vjs.zencdn.net/5.8.8/photo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/photojs-youtube/2.1.1/Youtube.min.js"></script>


    <script src="https://js.pusher.com/3.2/pusher.min.js"></script>

    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/jquery.noty.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/themes/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/promise.js"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ Theme::asset($activeTheme . '::js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script>
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function() {
            jQuery('#content,#photo_sidebar').theiaStickySidebar();
        });
    </script>
@endsection
