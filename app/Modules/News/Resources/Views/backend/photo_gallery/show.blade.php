@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::photo_gallery.management')}}
            <small>{{$record->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('photo_gallery.index') !!}">{{trans('news::photo_gallery.management')}}</a></li>
            <li class="active">{{$record->title}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$record->title}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>{{trans('news::photo_gallery.photo_category_id')}}</th>
                                <td>{{$record->photo_category->name}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('common.title')}}</th>
                                <td>{{$record->title}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('common.slug')}}</th>
                                <td>{{$record->slug}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_gallery.short_url')}}</th>
                                <td>{{$record->short_url}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('common.description')}}</th>
                                <td>{{$record->description}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('common.keywords')}}</th>
                                <td>{{$record->keywords}}</td>
                            </tr>
                            <tr>
                                <th>{{trans('common.thumbnail')}}</th>
                                <td><img src="{{asset('/gallery/' . $record->id . '/photos/' . $record->thumbnail)}}"></td>
                            </tr>
                            <tr>
                                <th>{{trans('news::photo_gallery.is_cuff')}}</th>
                                <td>{!!$record->is_cuff ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                            </tr>
                            <tr>
                                <th>{{trans('common.is_active')}}</th>
                                <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        //active menu
        activeMenu('photo_gallery', 'news_management');
    </script>
@endpush