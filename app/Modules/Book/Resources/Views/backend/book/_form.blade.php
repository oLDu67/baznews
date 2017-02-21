@extends($activeTheme .'::backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!--Top header start-->
            <h3 class="ls-top-header">{{trans('book::book.management')}}</h3>
            <!--Top header end -->

            <!--Top breadcrumb start -->
            <ol class="breadcrumb">
                <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! URL::route('book.index') !!}"> {{ trans('book::book.news_categories') }} </a></li>
                <li class="active"> {{ trans('book::common.add_update') }}</li>
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
                    {!! Form::model($record, ['route' => ['book.update', $record], 'method' => 'PATCH', 'files' => 'true']) !!}
                @else
                    {!! Form::open(['route' => 'book.store','method' => 'post', 'files' => 'true']) !!}
                @endif

                <div class="panel-body">

                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('name', trans('book::book.name'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('name', $record->name, ['placeholder' => trans('book::book.name') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('slug', trans('book::book.slug'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('slug', $record->_rgt, ['placeholder' => trans('book::book.slug') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('link', trans('book::book.link'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('link', $record->link, ['placeholder' => trans('book::book.link') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('thumbnail', trans('book::book.thumbnail'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::file('thumbnail') !!}
                                <img id="preview" src="#" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('photo', trans('book::book.photo'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::file('photo') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {!! Form::label('book_author_id', trans('book::book.book_author_id'),['class'=> 'col-lg-2 control-label']) !!}

                        <div class="col-lg-10">
                            {!! Form::select('book_author_id', $bookAuthorList , $record->book_author_id, ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="row">
                        {!! Form::label('publisher', trans('book::book.publisher'),['class'=> 'col-lg-2 control-label']) !!}

                        <div class="col-lg-10">
                            {!! Form::select('publisher_id', $publisherList , $record->publisher_id, ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('description', trans('book::book.description'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::textarea('description', $record->description, ['placeholder' => trans('book::book.description') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('ISBN', trans('book::book.ISBN'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('ISBN', $record->ISBN, ['placeholder' => trans('book::book.ISBN') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('release_date', trans('book::book.release_date'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('release_date', $record->release_date, ['placeholder' => trans('book::book.release_date') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('number_of_print', trans('book::book.number_of_print'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('number_of_print', $record->number_of_print, ['placeholder' => trans('book::book.number_of_print') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('skin_type', trans('book::book.skin_type'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('skin_type', $record->skin_type, ['placeholder' => trans('book::book.skin_type') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('release_date', trans('book::book.release_date'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('release_date', $record->release_date, ['placeholder' => trans('book::book.release_date') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('paper_type', trans('book::book.paper_type'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('paper_type', $record->paper_type, ['placeholder' => trans('book::book.paper_type') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {!! Form::label('size', trans('book::book.size'),['class'=> 'col-lg-2 control-label']) !!}

                            <div class="col-lg-10">
                                {!! Form::text('size', $record->size, ['placeholder' => trans('book::book.size') ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('book::common.status')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('is_cuff', null , $record->is_cuff) !!}
                                        <i></i> {{trans('book::common.is_cuff')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            {{trans('book::common.status')}}
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox i-checks">
                                    <label>
                                        {!! Form::checkbox('is_active', null , $record->is_active) !!}
                                        <i></i> {{trans('book::common.is_active')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('news::news.select_categories') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::select('book_category_ids[]', $bookCategoryList , $bookCategoryIDs , ['class' => 'form-control select2','multiple' => 'multiple']) !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div><!-- end row -->
    <!-- Main Content Element  End-->
</div><!-- end container-fluid -->
@endsection

@section('css')
    <link href="{{ Theme::asset('default-theme::AdminLTE/plugins/select2/select2.min.css') }}" rel="stylesheet">
    <style>
        #preview {display: none;}
        .display {display: block !important;}
    </style>
@endsection


@section('js')

    <script src="{{ Theme::asset('default-theme::AdminLTE/plugins/select2/select2.full.min.js') }}"></script>


    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
        });
    </script>

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    {{--<textarea name="content" class="form-control my-editor">{!! old('content', $content) !!}</textarea>--}}
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea.content",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>


    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                $( "#preview" ).addClass( "display" );
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#thumbnail").change(function(){
            readURL(this);
        });
    </script>

@endsection

