@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/info/base') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label">游戏年龄</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="years" value="{{$user->nickname}}">
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-4 control-label">擅长类型</label>
                    <div class="col-md-6">
                        <label class="col-md-3 checkbox"><input type="checkbox" name="skilled"/>ACD</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" name="skilled"/>AVG</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" name="skilled"/>FPS</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" name="skilled"/>FTG</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" name="skilled"/>RAC</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" name="skilled"/>RPG</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" name="skilled"/>RTS</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" name="skilled"/>SLG</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" name="skilled"/>SPG</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" name="skilled"/>STG</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" name="skilled"/>MUG</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" name="skilled"/>PUZ</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" name="skilled"/>TAB</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" name="skilled"/>ADV</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">游戏历史</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="years" value="{{$user->nickname}}">

                        <div  ms-controller="gamePicker">
                            <div ms-include-src="tpl"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">生日</label>
                    <div class="col-md-6">
                        <div class="input-group date form_date col-md-8" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input class="form-control"  type="text" name="birthday" value="{{date('Y-m-d', $user->birthday)}}" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        <input class="col-md-4" type="hidden" id="dtp_input2" value="{{date('Y-m-d', $user->birthday)}}" /><br/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">出生地</label>
                    <div id="bornDisctrict">
                    </div>
                </div>
                <div class="form-group" ms-controller="locationAddress">
                    <label class="col-md-4 control-label">所在地</label>
                    <div id="location"></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            　提交　
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    require(['app/user/info/career'], function() {

    });
</script>
@endsection
