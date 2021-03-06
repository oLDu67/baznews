@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('theme_manager.management')}}
            <small>{{trans('theme_manager.list')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('theme_manager.index') !!}"> {{trans('theme_manager.management')}}</a></li>
            <li class="active">{{trans('common.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--Top header start-->
                <h3 class="ls-top-header">{{trans('module_manager.management')}}</h3>
                <!--Top header end -->

                <!--Top breadcrumb start -->
                <ol class="breadcrumb">
                    <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                    <li>
                        <a href="{!! URL::route('module_manager.index') !!}"> {{ trans('module_manager.countries') }} </a>
                    </li>
                    <li class="active"> {{ trans('common.add_update') }}</li>
                </ol>
                <!--Top breadcrumb start -->
            </div>
        </div>
        <!-- Main Content Element  Start-->
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-light-blue">
                    <div class="panel-heading">
                        {{--/<h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>--}}
                    </div>

                    @if(isset($record->id))
                        {!! Form::model($record, ['route' => ['module_manager.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
                    @else
                        {!! Form::open(['route' => 'module_manager.store','method' => 'post', 'files' => 'true']) !!}
                    @endif

                    <div class="panel-body">

                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('name', trans('module_manager.name'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('name', $record->name, ['placeholder' => trans('module_manager.name') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('slug', trans('common.slug'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('slug', $record->slug, ['placeholder' => trans('common.slug') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('order', trans('common.order'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::number('order', $record->order, ['placeholder' => trans('common.order') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {{trans('module_manager.header')}}
                                <div class="col-lg-offset-2 col-lg-10">
                                    <div class="checkbox i-checks">
                                        <label>
                                            {!! Form::checkbox('is_header', null , $record->is_active) !!}
                                            <i></i> {{trans('common.is_active')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {{trans('module_manager.left')}}
                                <div class="col-lg-offset-2 col-lg-10">
                                    <div class="checkbox i-checks">
                                        <label>
                                            {!! Form::checkbox('is_left', null , $record->is_active) !!}
                                            <i></i> {{trans('common.is_active')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {{trans('module_manager.center')}}
                                <div class="col-lg-offset-2 col-lg-10">
                                    <div class="checkbox i-checks">
                                        <label>
                                            {!! Form::checkbox('is_center', null , $record->is_active) !!}
                                            <i></i> {{trans('common.is_active')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {{trans('module_manager.right')}}
                                <div class="col-lg-offset-2 col-lg-10">
                                    <div class="checkbox i-checks">
                                        <label>
                                            {!! Form::checkbox('is_right', null , $record->is_active) !!}
                                            <i></i> {{trans('common.is_active')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                {{trans('common.status')}}
                                <div class="col-lg-offset-2 col-lg-10">
                                    <div class="checkbox i-checks">
                                        <label>
                                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                            <i></i> {{trans('common.is_active')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-success" type="submit"><i
                                                class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div><!-- end row -->
        <!-- Main Content Element  End-->
    </div><!-- end container-fluid -->
@endsection
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('theme_manager', '');
    </script>
@endpush