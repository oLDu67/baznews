@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::recommendation_news.management')}}
            <small>{{trans('common.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li>
                <a href="{!! URL::route('recommendation_news.index') !!}">{{trans('news::recommendation_news.management')}}</a>
            </li>
            <li class="active">{{trans('common.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('recommendation_news.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('news::recommendation_news.create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('news::recommendation_news.management')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table id="recommnendation_news" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('news::recommendation_news.news_id')}}</th>
                            <th>{{trans('news::recommendation_news.user_id')}}</th>
                            <th>{{trans('common.order')}}</th>
                            <th>{{trans('news::recommendation_news.is_cuff')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                            <th>{{trans('common.edit_delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>{{$record->id}}</td>
                                <td>{!! link_to_route('recommendation_news.show', $record->news->title , $record, [] ) !!}</td>
                                <td>{!! link_to_route('user.show', $record->user->name, $record, [] ) !!}</td>
                                <td> {{$record->order }} </td>
                                <td>{!!$record->is_cuff ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                <td>
                                    <div class="btn-group">
                                        @if($record->is_active)
                                            {!! link_to_route('show_news', trans('common.show'), $record->news->slug, ['target' => '_blank', 'class' => 'btn btn-info btn-xs'] ) !!}
                                        @endif
                                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('recommendation_news.destroy',  $record))) !!}

                                        {!! link_to_route('recommendation_news.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}

                                        {!! Form::submit('Sil', ['class' => 'btn btn-danger btn-xs','data-toggle'=>'confirmation']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('recommendation_news', 'news_management');
    </script>
@endpush