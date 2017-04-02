<li class="treeview">
    <a href="#">
        <i class="fa fa-file-text-o"></i>
        <span>{{trans('article::dashboard.article_authors')}}</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        @permission('index-articleauthor'))<li><a href="{!! route('article_author.index') !!}"><i class="fa fa-user"></i> <span>{{trans('article::dashboard.authors')}}</span></a></li>@endpermission
        @permission('index-article'))<li><a href="{!! route('article.index') !!}"><i class="fa fa-file-text"></i> <span>{{trans('article::dashboard.articles')}}</span></a></li>@endpermission
        @permission('index-articlecategory'))<li><a href="{!! route('article_category.index') !!}"><i class="fa fa-list"></i> <span>{{trans('article::dashboard.article_categories')}}</span></a></li>@endpermission
        @permission('index-articlesetting'))<li><a href="{!! route('article_setting.index') !!}"><i class="fa fa-cog"></i> <span>{{trans('article::dashboard.article_settings')}}</span></a></li>@endpermission
    </ul>
</li>
