@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::video.management')}}
            <small>{{trans('common.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('video.index') !!}">{{trans('news::video.management')}}</a></li>
            <li class="active">{{trans('news::video.list')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('video.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('common.create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('news::video.list')}}</strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                    <table id="videos" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('news::video.name')}}</th>
                            <th>{{trans('common.thumbnail')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                            <th>{{trans('common.edit_delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('video.show', $record->name , $record, [] ) !!}</td>
                                    <td>
                                        <img src="{{ asset('videos/' . $record->id . '/58x58_' . $record->thumbnail)}}"
                                             alt="{{$record->title}}" title="{{$record->title}}"/>
                                    </td>
                                    <td>{!!$record->is_active ? '<label class="badge bg-green">' . trans('common.active') . '</label>' : '<label class="badge bg-brown">' . trans('common.passive') . '</label>'!!}</td>
                                    <td>
                                        <div class="btn-group">
                                            @if($record->is_active)
                                                {!! link_to_route('show_videos', trans('common.show'), $record->slug, ['target' => '_blank', 'class' => 'btn btn-info btn-xs'] ) !!}
                                            @endif
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('video.destroy',  $record))) !!}

                                            {!! link_to_route('video.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}


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
    <script>
        $(function () {

            //active menu
            activeMenu('video', 'news_management');
        });
    </script>
@endpush