@extends($activeTheme .'::backend.master')
@section('content-header')
    <section class="content-header">
        <h1>
            {{trans('news::news.management')}}
            <small>{{trans('common.create_edit')}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! URL::route('news.index') !!}">{{trans('news::news.management')}}</a></li>
            <li class="active">{{trans('common.create_edit')}}</li>
        </ol>
    </section>
@endsection
@section('content')
    {!! Form::open(['route' => 'news_setting.store','method' => 'post', 'files' => 'true']) !!}
    <!-- Main Content Element  Start-->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{trans('news::news_setting.news_setting')}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('break_news', trans('news::news_setting.break_news'),['class'=> 'col-lg-2 control-label']) !!}
                        {!! Form::number('break_news', $records->where('attribute_key','break_news')->first()->attribute_value, ['placeholder' => trans('news::news_setting.break_news') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('band_news', trans('news::news_setting.band_news'),['class'=> 'col-lg-2 control-label']) !!}
                        {!! Form::number('band_news', $records->where('attribute_key','band_news')->first()->attribute_value, ['placeholder' => trans('news::news_setting.band_news') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('box_cuff', trans('news::news_setting.box_cuff'),['class'=> 'col-lg-2 control-label']) !!}
                        {!! Form::number('box_cuff', $records->where('attribute_key','box_cuff')->first()->attribute_value, ['placeholder' => trans('news::news_setting.box_cuff') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('main_cuff', trans('news::news_setting.main_cuff'),['class'=> 'col-lg-2 control-label']) !!}
                        {!! Form::number('main_cuff', $records->where('attribute_key','main_cuff')->first()->attribute_value, ['placeholder' => trans('news::news_setting.main_cuff') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('mini_cuff', trans('news::news_setting.mini_cuff'),['class'=> 'col-lg-2 control-label']) !!}
                        {!! Form::number('mini_cuff', $records->where('attribute_key','mini_cuff')->first()->attribute_value, ['placeholder' => trans('news::news_setting.mini_cuff') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('find_tags_in_content', trans('news::news_setting.find_tags_in_content'),['class'=> 'col-lg-2 control-label']) !!}
                        {!! Form::number('find_tags_in_content', $records->where('attribute_key','find_tags_in_content')->first()->attribute_value, ['placeholder' => trans('news::news_setting.find_tags_in_content') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('automatic_add_tags', trans('news::news_setting.automatic_add_tags'),['class'=> 'col-lg-2 control-label']) !!}
                        {!! Form::number('automatic_add_tags', $records->where('attribute_key','automatic_add_tags')->first()->attribute_value, ['placeholder' => trans('news::news_setting.automatic_add_tags') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('is_show_previous_and_next_news', trans('news::news_setting.is_show_previous_and_next_news'),['class'=> 'col-lg-2 control-label']) !!}
                        {!! Form::number('is_show_previous_and_next_news', $records->where('attribute_key','is_show_previous_and_next_news')->first()->attribute_value, ['placeholder' => trans('news::news_setting.is_show_previous_and_next_news') ,'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit"><i
                                    class="fa fa-check-square-o"></i> {{trans('common.save')}}</button>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div><!-- end row -->
    <!-- Main Content Element  End-->

    {!! Form::close() !!}
@endsection
@section('css')

@endsection
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('news_setting', 'news_management');
    </script>
@endpush