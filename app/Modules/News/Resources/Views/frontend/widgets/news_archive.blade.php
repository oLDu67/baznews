<div class="widget">
    <div class="title-section">
        <h1>
            <span>{{trans('news.box_cuff_widget_title')}}</span>
        </h1>
    </div>

    {!! Form::open(['route' => 'archive_index','method' => 'get']) !!}
        <div class="panel-body">
        {{--<div class="form-group">--}}
        {{--<div class="row">--}}
        {{--{!! Form::label('news_category', trans('news::news.selected_all_categories'),['class'=> 'col-lg-2 control-label']) !!}--}}

        {{--<div class="col-lg-10">--}}
        {{--{!! Form::select('news_category', $newsCategoryList , null , ['placeholder' => trans('news::common.please_choose'),'class' => 'form-control']) !!}--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

        <div class="form-group">
            <div class="row">
                {!! Form::label('days', trans('news::archive.datetime'),['class'=> 'col-lg-2 control-label']) !!}

                <div class="col-lg-10">

                    {!!  Form::selectRange('days', 1, 31) !!}

                    {{--<select id="days" class="form-control">--}}
                    {{--<option value="1">1</option>--}}
                    {{--<option value="2">2</option>--}}
                    {{--<option value="3">3</option>--}}
                    {{--<option value="4">4</option>--}}
                    {{--<option value="5">5</option>--}}
                    {{--<option value="6">6</option>--}}
                    {{--<option value="7">7</option>--}}
                    {{--<option value="8">8</option>--}}
                    {{--<option value="9">9</option>--}}
                    {{--<option value="10">10</option>--}}
                    {{--<option value="11">11</option>--}}
                    {{--<option value="12">12</option>--}}
                    {{--<option value="13">13</option>--}}
                    {{--<option value="14">14</option>--}}
                    {{--<option value="15">15</option>--}}
                    {{--<option value="16">16</option>--}}
                    {{--<option value="17">17</option>--}}
                    {{--<option value="18">18</option>--}}
                    {{--<option value="19">19</option>--}}
                    {{--<option value="20">20</option>--}}
                    {{--<option value="21">21</option>--}}
                    {{--<option value="22">22</option>--}}
                    {{--<option value="23">23</option>--}}
                    {{--<option value="24">24</option>--}}
                    {{--<option value="25">25</option>--}}
                    {{--<option value="26">26</option>--}}
                    {{--<option value="27">27</option>--}}
                    {{--<option value="28">28</option>--}}
                    {{--<option value="29">29</option>--}}
                    {{--<option value="30">30</option>--}}
                    {{--<option value="31">31</option>--}}
                    {{--</select>--}}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                {!! Form::label('months', trans('news::archive.datetime'),['class'=> 'col-lg-2 control-label']) !!}

                <div class="col-lg-10">
                    <select id="months" name="months" class="form-control">
                        <option value="1">{{trans('setting.january')}}</option>
                        <option value="2">{{trans('setting.february')}}</option>
                        <option value="3">{{trans('setting.march')}}</option>
                        <option value="4">{{trans('setting.may')}}</option>
                        <option value="5">{{trans('setting.april')}}</option>
                        <option value="6">{{trans('setting.june')}}</option>
                        <option value="7">{{trans('setting.july')}}</option>
                        <option value="8">{{trans('setting.august')}}</option>
                        <option value="9">{{trans('setting.september')}}</option>
                        <option value="10">{{trans('setting.october')}}</option>
                        <option value="11">{{trans('setting.november')}}</option>
                        <option value="12">{{trans('setting.december')}}</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                {!! Form::label('years', trans('news::archive.datetime'),['class'=> 'col-lg-2 control-label']) !!}

                <div class="col-lg-10">
{{--                    {!! Form::text('years', null,['class'=> 'col-lg-2 control-label']) !!}--}}
                    <select id="years" name="years" class="form-control">
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> {{trans('common.search')}}</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
