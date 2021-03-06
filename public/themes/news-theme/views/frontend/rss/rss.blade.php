@extends($activeTheme . '::frontend.master')


@section('content')

    <article class="container" id="container">

        <div class="row">
            <div class="col-md-8">
                <div class="title-section">
                    <h1><span>RSS Bağlantılarımız</span></h1>
                </div>
                <div class="page-content module">
                    <div class="rss-links">
                        <h2>RSS Bağlantı Linklerimiz</h2>
                        <p>Aşağıdaki linkleri kullanarak rss bağlantısı kurabilirsiniz.</p>
                        <ul>
                            @foreach($rssItems as $rssItem)
                                <li><a href="{{$rssItem->url}}"> {{$rssItem->name}} </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="widget">
                        @foreach($widgets as $widget)
                            @widget($widget['namespace'])
                            <br/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article><!-- /.article -->
@endsection

@section('meta_tags')
    <title> {{Cache::tags('Setting')->get('url')}} rss.xml  </title>
    <meta name="keywords" content="{{Cache::tags('Setting')->get('url')}} rss.xml "/>
    <meta name="description" content="{{Cache::tags('Setting')->get('url')}} rss.xml "/>
@endsection