@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('book::book.management')}}
            <small>{{trans('common.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('book.index') !!}">{{trans('book::book.management')}}</a></li>
            <li class="active">{{trans('common.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    @if(isset($record->id))
        {!! Form::model($record, ['route' => ['book.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
    @else
        {!! Form::open(['route' => 'book.store','method' => 'post', 'files' => 'true']) !!}
    @endif

    {!! Form::hidden('user_id', Auth::user()->id) !!}

    <div class="row">
        <div class="col-lg-8" id="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('common.create_edit')}}</h3>

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
                        {!! Form::label('name', trans('book::book.name'),['class'=> 'control-label']) !!}
                        {!! Form::text('name', $record->name, ['placeholder' => trans('book::book.name') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', trans('common.slug'),['class'=> 'control-label']) !!}
                        {!! Form::text('slug', $record->_rgt, ['placeholder' => trans('common.slug') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('short_url', trans('book::book.short_url'),['class'=> 'control-label']) !!}
                        {!! Form::text('short_url', $record->short_url, ['placeholder' => trans('book::book.short_url') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('link', trans('book::book.link'),['class'=> 'control-label']) !!}
                        {!! Form::text('link', $record->link, ['placeholder' => trans('book::book.link') ,'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('author_id', trans('book::book.book_author'),['class'=> 'control-label']) !!}
                        {!! Form::select('author_id', $bookAuthorList , $record->author_id, ['placeholder' => trans('common.please_choose'),'class' => 'form-control select2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('publisher_id', trans('book::book.book_publisher'),['class'=> 'control-label']) !!}
                        {!! Form::select('publisher_id', $bookPublisherList , $record->publisher_id, ['placeholder' => trans('common.please_choose'),'class' => 'form-control select2']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', trans('common.description'),['class'=> 'control-label']) !!}
                        {!! Form::textarea('description', $record->description, ['placeholder' => trans('common.description') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('ISBN', trans('book::book.ISBN'),['class'=> 'control-label']) !!}
                                {!! Form::text('ISBN', $record->ISBN, ['placeholder' => trans('book::book.ISBN') ,'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('number_of_print', trans('book::book.number_of_print'),['class'=> 'control-label']) !!}
                                {!! Form::text('number_of_print', $record->number_of_print, ['placeholder' => trans('book::book.number_of_print') ,'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('skin_type', trans('book::book.skin_type'),['class'=> 'control-label']) !!}
                                {!! Form::text('skin_type', $record->skin_type, ['placeholder' => trans('book::book.skin_type') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('release_date', trans('book::book.release_date'),['class'=> 'control-label']) !!}
                                {!! Form::text('release_date', $record->release_date, ['placeholder' => trans('book::book.release_date') ,'class' => 'form-control','id'=>'show_time']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('paper_type', trans('book::book.paper_type'),['class'=> 'control-label']) !!}
                                {!! Form::text('paper_type', $record->paper_type, ['placeholder' => trans('book::book.paper_type') ,'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('size', trans('book::book.size'),['class'=> 'control-label']) !!}
                                {!! Form::text('size', $record->size, ['placeholder' => trans('book::book.size') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>


                </div><!-- /.box-body -->
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-lg-4" id="sidebar">
            <div class="box box-solid">
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
                        <label for="book_category_ids[]">{{ trans('book::book.select_categories') }}</label>
                        {!! Form::select('book_category_ids[]', $bookCategoryList , $bookCategoryIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_comment', null , $record->is_comment) !!}
                            {{ trans('common.is_comment') }}
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                            {{trans('book::book.is_cuff')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! Form::checkbox('is_active', null , $record->is_active) !!}
                            <i></i> {{trans('common.is_active')}}
                        </label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i
                                    class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                    </div>
                </div><!-- /.box-body -->
                <!-- /.box-body -->
            </div>

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('book::book.image') }}</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('thumbnail', trans('common.thumbnail'),['class'=> 'control-label','style'=>'width:100%']) !!}

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                 style="width: 200px; height: 150px;">
                                <img src="{{ asset('images/books/' . $record->id . '/original/' . $record->thumbnail)}}"
                                     alt="{{$record->name}}"/>
                            </div>
                            <div>
                                <span class="btn btn-default btn-file"><span
                                            class="fileinput-new">{{trans('common.select_image')}}</span><span
                                            class="fileinput-exists">{{trans('common.change')}}</span>{!! Form::file('thumbnail') !!}</span>
                                <a href="#" class="btn btn-default fileinput-exists"
                                   data-dismiss="fileinput">{{trans('common.remove')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('photo', trans('book::book.photo'),['class'=> 'control-label','style'=>'width:100%']) !!}

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                 style="width: 200px; height: 150px;">
                                <img src="{{ asset('images/books/' . $record->id . '/photo/' . $record->photo)}}"
                                     alt="{{$record->name}}"/>
                            </div>
                            <div>
                                <span class="btn btn-default btn-file"><span
                                            class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{!! Form::file('photo') !!}</span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>

            <!-- /.box -->
        </div>
    </div>
    {!! Form::close() !!}

@endsection
@section('css')
    <link rel="stylesheet"
          href="{{ asset($themeAssetsPath . 'js/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset($themeAssetsPath . 'js/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset($themeAssetsPath . 'js/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link href="{{ asset($themeAssetsPath . 'js/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}"
          rel="stylesheet">
@endsection
@push('js')

    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/moment/locale/tr.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset($themeAssetsPath . 'js/ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript">
        //CKEDİTOR START
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
            language: 'tr'
        };
        CKEDITOR.replace('description', options);
        //CKEDİTOR END
        $(document).ready(function () {
            $('.select2').select2();
            $('.tagsinput').tagsinput();
            //Date range picker with time picker
            $('#show_time').datetimepicker({
                format: 'YYYY-MM-DD',
                locale: 'tr'
            });
        });
        $(window).resize(function () {
            $('.select2').select2();
            $('.tagsinput').tagsinput();
        });
        /*--------------------------------------------------------
         Sticky Sidebar
         * --------------------------------------------------------*/
        jQuery(document).ready(function () {
            jQuery('#sidebar,#content').theiaStickySidebar();
        });
        //active menu
        activeMenu('books', 'book_management');
    </script>
@endpush


