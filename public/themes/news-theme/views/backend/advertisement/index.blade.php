@extends($activeTheme . '::backend.master')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div style="margin-bottom: 20px;">
                <a href="{{ route('advertisement.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> {{ trans('common.create') }}
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{trans('advertisement.management')}}</strong></h3>
                </div>
                <div>
                    <ul>
                        <h3> Active theme ({{$activeTheme}}) advertisement areas </h3>
                        @foreach($advertisementAreaNames as $advertisementAreaName)
                            <li>
                                {{$advertisementAreaName['areaName']}} -- {{$advertisementAreaName['areaType']}}

                                @if(in_array($advertisementAreaName['areaName'] , \App\Models\Advertisement::advertisements()->pluck('name')->toArray()))
                                    <b>(ekli)</b>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="countries" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('advertisement.name')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{!! link_to_route('advertisement.show', $record->name , $record, [] ) !!}</td>
                                    <td>{!!$record->is_active ? '<label class="badge badge-green">' . trans('common.active') . '</label>' : '<label class="badge badge-brown">' . trans('common.passive') . '</label>'!!}</td>
                                    <td>
                                        <div class="btn-group">
                                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('advertisement.destroy',  $record))) !!}

                                            {!! link_to_route('advertisement.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}


                                            {!! Form::submit('Sil', ['class' => 'btn btn-danger btn-xs','data-toggle'=>'confirmation']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>{{trans('advertisement.name')}}</th>
                            <th>{{trans('common.is_active')}}</th>
                        </tr>
                        </tfoot>
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