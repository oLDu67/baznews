@extends($activeTheme . '::backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--Top header start-->
                <h3 class="ls-top-header">{{trans('setting.management')}}</h3>
                <!--Top header end -->

                <!--Top breadcrumb start -->
                <ol class="breadcrumb">
                    <li><a href="{!! URL::route('dashboard') !!}"><i class="fa fa-home"></i></a></li>
                    <li><a href="{!! URL::route('setting.index') !!}"> {{ trans('setting.settings') }} </a></li>
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
                        {{--<h3 class="panel-title">Kullanıcı Ekle / Düzenle Formu</h3>--}}
                    </div>

                    <div class="panel-body">

                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('attribute_key', trans('setting.attribute_key'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('attribute_key', $record->attribute_key, ['placeholder' => trans('setting.attribute_key') ,'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('attribute_value', trans('setting.attribute_value'),['class'=> 'col-lg-2 control-label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('attribute_value', $record->attribute_value, ['placeholder' => trans('setting.attribute_value') ,'class' => 'form-control']) !!}
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
                </div>
            </div>
        </div><!-- end row -->
        <!-- Main Content Element  End-->
    </div><!-- end container-fluid -->

@endsection
@push('js')
    <script type="text/javascript">
        //active menu
        activeMenu('setting', 'general_setting');
    </script>
@endpush
