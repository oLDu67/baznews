@extends($activeTheme . '::frontend.master')

@section('content')

    2.Tema parçalara ayrılarak cachelenecek<br>
    3.Setting module tamamlanacak.<br>
    6.Theme de widget yerilerini göstermek için her temanın içerisine temenın şablonunu gösteren foto olacak aktif widget dan o resmi çekip tema ve widget yönetimine koyulacak.<br>
  ??7.Theme ayarlarından theme in alanları alınabilecek.(Tema ayarlarında 'sidebar','rightbar' vs.. listelenirken veriler theme in ayarlarından gelecek.)<br>
    9.News Modülü geliştirilecek<br>
    v210.Moduller aktif ve pasif yapıldığında seeder  migrate ve seeder çalıştırılarak.Modul ayarları eklenip silinebilecek.(widget vs..)<br>
    11.Auth::user() presenter pattern ları yapılacak.<br>
    13.Video Ekleme Tamamlanacak.<br>
    14.php artisan komutlarının bazıları setting sayfasında çalıştırılabilecek..(backup list)<br>
    15.Social provider register sayfalarına bakılacak paaword sorunu çözülecek.<br/>
    16.Account sayfası yapılacak.(kullanıcı fotosu socialite dan alınabilir mi? gravatar dan da alınabilir.) <br />
    +17.Arşiv bölümü yapılacak.(tarihe göre seçerken api kullanılacak.) <br />
    19.Dashboard Yapılacak <br />
    20.Status Durumları ENUM yapılacak.(ekranda nasıl listelenecek ona da bakılacak) <br />
    21.open graft lar eklenecek <br />
    23.tema eklenecek.<br />
    24.face comment eklenecek.<br />
    25.admin tarafına editorlerin kullanabileceği chat uygulaması koyulacak.<br />;
    26.haberlere unique uid() koyulacak.<br />;


    APP_ENV=local
    APP_KEY=base64:Yr/opRj3NViZF9REHlU5WWingI5jLnJ8rkINNNS3nfM=
    APP_DEBUG=true
    APP_LOG_LEVEL=debug
    APP_URL=http://localhost

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=baznews
    DB_USERNAME=homestead
    DB_PASSWORD=secret

    BROADCAST_DRIVER=log
    CACHE_DRIVER=redis
    SESSION_DRIVER=file
    QUEUE_DRIVER=redis

    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379

    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=465
    MAIL_USERNAME=hudayianket@gmail.com
    MAIL_PASSWORD=dd1985ilam
    MAIL_ENCRYPTION=ssl

    PUSHER_APP_ID=
    PUSHER_KEY=
    PUSHER_SECRET=

    SCOUT_DRIVER=algolia
    ALGOLIA_APP_ID=RSUIT6WJY7
    ALGOLIA_SECRET=c0787229689cc39436deb67a27548754
    SCOUT_QUEUE=true

    <h1>Sayfa Ayarları</h1>
    <br />
    
    <example></example>

    <h1>breakNewsItems</h1>
    <br />
    @foreach($breakNewsItems as $breakNewsItem)
        {{$breakNewsItem->title}} <br/>


        {{--<video id="example_video_1" class="video-js vjs-default-skin"--}}
               {{--controls preload="auto" width="640" height="264"--}}
               {{--poster="http://video-js.zencoder.com/oceans-clip.png"--}}
               {{--data-setup='{"example_option":true}'>--}}
            {{--<source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4" />--}}
            {{--<source src="http://video-js.zencoder.com/oceans-clip.webm" type="video/webm" />--}}
            {{--<source src="http://video-js.zencoder.com/oceans-clip.ogv" type="video/ogg" />--}}
            {{--<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>--}}
        {{--</video>--}}





        <video
                id="{{$breakNewsItem->id}}"
                class="video-js vjs-default-skin"
                controls
                width="640" height="264"
                data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{!! $breakNewsItem->video_embed !!}"}] }'
        >
        </video>


         <br/>
    @endforeach

    <h1>bandNewsItem</h1>
    <br />
    @foreach($bandNewsItems as $bandNewsItem)
        <a href="{!! route('show_news', ['newsSlug' => $bandNewsItem->slug]) !!}">{{$bandNewsItem->title}}</a>
        <br/>

    @endforeach

    <h1>mainCuffNewsItems</h1>
    <br />
    @foreach($mainCuffNewsItems as $mainCuffNewsItem)
        {{$mainCuffNewsItem->title}} <br/>
    @endforeach

    <h1>miniCuffNewsItems</h1>
    <br />
    @foreach($miniCuffNewsItems as $miniCuffNewsItem)
        {{$miniCuffNewsItem->title}} <br/>
        <img src="{{$miniCuffNewsItem->cuff_photo}}"> <br/>
    @endforeach

    <h1>Haber Kategoriler</h1>
    <br />
    @foreach($cuffNewsCategories as $cuffNewsCategory)

        {{$cuffNewsCategory->name}} : <br>

        @foreach($cuffNewsCategory->news as $categoryNews)
            {{$categoryNews->title}},
        @endforeach
        <br>
    @endforeach

    <h1>Photo Galleries</h1>
    <br />
    @foreach($photoGalleries as $photoGallery)
        {{$photoGallery->title}} <br/>
    @endforeach

    <h1>Video Galleries</h1>
    <br />
    @foreach($videoGalleries as $videoGallery)
        {{$videoGallery->title}} <br/>
    @endforeach


    <br>
    {{--@widget('RecommendationNews')--}}

    @foreach($widgets as $widget)
        <br />
        @widget($widget['namespace'])
    @endforeach

    {{--<br />--}}
    {{--@widget('\App\Modules\Article\Widgets\RecentArticles')--}}
    {{--<br />--}}
    {{--@widget('\App\Modules\Book\Widgets\RecentBooks')--}}
    {{--<br />--}}
    {{--@widget('\App\Modules\Biography\Widgets\Biographies')--}}

    
    <br />
    widget ve sitemap rss tabloları yapılacak.

@endsection

{{--@section('widgets')--}}

    {{--@foreach($modules as $module)--}}

        {{--@if($module['widget'] == true )--}}

            {{--{!! Theme::view($module['slug'] . '::frontend.widget') !!}--}}
        {{--@endif--}}

    {{--@endforeach--}}

    {{--@include($activeTheme . '::frontend.book.index')--}}

{{--@endsection--}}

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


@section('css')
    <link href="//vjs.zencdn.net/5.8/video-js.min.css" rel="stylesheet">

    <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">
@endsection

@section('js')
    <script src="js/app.js"></script>

    <script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-youtube/2.1.1/Youtube.min.js"></script>


    <script src="https://js.pusher.com/3.2/pusher.min.js"></script>

    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/jquery.noty.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/themes/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/promise.js"></script>


    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('72259496952df9087a50', {
            cluster: 'eu',
            encrypted: true
        });

        var channel = pusher.subscribe('test_channel');
        channel.bind('my_event', function(data) {

//                alert(data.title + ' ' + data.message );
//            var n = noty({text: data.title + ' ' + data.message});

        });
    </script>

@endsection
