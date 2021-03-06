@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('group.management')}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li class="active">{{trans('group.management')}}</li>
        </ol>
    </section>
@endsection
@section('content')

    <div style="margin-bottom: 20px;">
        <a href="{{ route('group.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> {{ trans('group.add_group') }}
        </a>
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Grup Listesi</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="table-responsive">
                @include($activeTheme . '::backend.partials._pagination', ['records' => $records ])
                <table id="groups" class="table table-bordered table-hover" style="margin-bottom: 0;">
                    <thead>
                    <tr>
                        <th>{!! trans('group.name') !!}</th>
                        <th>{!! trans('group.user_count') !!}</th>
                        <th>{!! trans('common.is_active') !!}</th>
                        <th>{!! trans('group.edit_remove') !!}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr class="odd" group="row">
                            <td class="sorting_1">
                                {!! link_to_route('group.show', $record->name, $record, [] ) !!}
                            </td>
                            <td><span class="badge bg-yellow">{{$record->users->count()}}</span></td>
                            <td>
                                @if($record->is_active)
                                    <span class="badge bg-green">{{trans('common.active')}}</span>
                                @else
                                    <span class="badge bg-red">{{trans('common.passive')}}</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('group.destroy',  $record))) !!}
                                    {!! link_to_route('group.edit', trans('common.edit'), $record, ['class' => 'btn btn-primary btn-xs'] ) !!}
                                    {!! Form::submit('Sil', ['class' => 'btn btn-danger btn-xs','data-toggle'=>'confirmation']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>{!! trans('group.name') !!}</th>
                        <th>{!! trans('group.user_count') !!}</th>
                        <th>{!! trans('common.is_active') !!}</th>
                        <th>{!! trans('group.edit_remove') !!}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('user_management', 'group');
    </script>
@endpush
