@extends($activeTheme . '::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('page.management')}}
            <small>{{trans('common.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('page.index') !!}"> {{trans('page.management')}}</a></li>
            <li class="active">{{trans('common.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    <!-- Main Content Element  Start-->
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['page.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'page.store','method' => 'post', 'files' => 'true']) !!}
    @endif
    <div class="row">
        <div class="col-lg-9" id="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('common.content')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::label('name', trans('page.name'),['class'=> 'control-label']) !!}
                                {!! Form::text('name', $record->name, ['placeholder' => trans('page.name') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::label('slug', trans('common.slug'),['class'=> 'control-label']) !!}
                                {!! Form::text('slug', $record->slug, ['placeholder' => trans('common.slug') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">

                            <div class="col-lg-12">
                                {!! Form::label('content_area', trans('common.content'),['class'=> 'control-label']) !!}
                                {!! Form::textarea('content_area', $record->content, ['placeholder' => trans('common.content') ,'class' => 'form-control summernote']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::label('keywords', trans('common.keywords'),['class'=> 'control-label']) !!}
                                {!! Form::textarea('keywords', $record->keywords, ['placeholder' => trans('common.keywords') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::label('description', trans('common.description'),['class'=> 'control-label']) !!}
                                {!! Form::textarea('description', $record->description, ['placeholder' => trans('common.description') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-lg-3" id="sidebar">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('common.status')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>
                                    {!! Form::checkbox('is_comment', null , $record->is_comment) !!}
                                    &nbsp;&nbsp;{{trans('common.is_comment')}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>
                                    {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                    &nbsp;&nbsp;{{trans('common.is_active')}}
                                </label>
                            </div>
                        </div>
                    </div><!-- /.form-group -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-success pull-right" type="submit"><i
                                            class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {!! Form::close() !!}
    <!-- Main Content Element  End-->
@endsection

@push('js')
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/ckeditor/ckeditor.js') }}"></script>
    <script>
        //CKEDİTOR START
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
            language: 'tr'
        };
        CKEDITOR.replace('content_area', options);
        //CKEDİTOR END...
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
        //active menu
        activeMenu('page', '');
    </script>
@endpush