<li class="active treeview">
    <a href="#">
        <i class="fa fa-dashboard"></i> <span>{{trans('news::module.module_name')}}</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        {{--<li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>--}}
        {{--<li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>--}}
        <li><a href="{!! route('news_category.index') !!}"><i class="fa fa-book"></i> <span>HAber Kategorileri</span></a></li>
        <li><a href="{!! route('news.index') !!}"><i class="fa fa-book"></i> <span>Haberler</span></a></li>
        <li><a href="{!! route('future_news.index') !!}"><i class="fa fa-book"></i> <span>ileri tarihli haberler</span></a></li>
        <li><a href="{!! route('news_source.index') !!}"><i class="fa fa-book"></i> <span>haber kaynakları</span></a></li>
        <li><a href="{!! route('photo_category.index') !!}"><i class="fa fa-book"></i> <span>foto kategori</span></a></li>
        <li><a href="{!! route('photo_gallery.index') !!}"><i class="fa fa-book"></i> <span>photo galeri</span></a></li>
        <li><a href="{!! route('photo.index') !!}"><i class="fa fa-book"></i> <span>photolar</span></a></li>
        <li><a href="{!! route('recommendation_news.index') !!}"><i class="fa fa-book"></i> <span>tavsiye haberler</span></a></li>
        <li><a href="{!! route('video_category.index') !!}"><i class="fa fa-book"></i> <span>video kategori</span></a></li>
        <li><a href="{!! route('video_gallery.index') !!}"><i class="fa fa-book"></i> <span>video galeri</span></a></li>
        <li><a href="{!! route('video.index') !!}"><i class="fa fa-book"></i> <span>video</span></a></li>
    </ul>
</li>