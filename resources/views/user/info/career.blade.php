@extends('app')

@section('content')
<div class="container-fluid" ms-controller="career">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form id="careerForm" class="form-horizontal" role="form" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label">游戏年龄</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="years" ms-duplex-string="formData.years">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">擅长类型</label>
                    <div class="col-md-6">
                        <label class="col-md-3 checkbox"><input type="checkbox" ms-duplex="formData.skilled" value="ACD"/>ACD</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" ms-duplex="formData.skilled" value="AVG"/>AVG</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" ms-duplex="formData.skilled" value="FPS"/>FPS</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" ms-duplex="formData.skilled" value="FTG"/>FTG</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" ms-duplex="formData.skilled" value="RAC"/>RAC</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" ms-duplex="formData.skilled" value="RPG"/>RPG</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" ms-duplex="formData.skilled" value="RTS"/>RTS</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" ms-duplex="formData.skilled" value="SLG"/>SLG</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" ms-duplex="formData.skilled" value="SPG"/>SPG</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" ms-duplex="formData.skilled" value="STG"/>STG</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" ms-duplex="formData.skilled" value="MUG"/>MUG</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" ms-duplex="formData.skilled" value="PUZ"/>PUZ</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" ms-duplex="formData.skilled" value="TAB"/>TAB</label>
                        <label class="col-md-3 checkbox"><input type="checkbox" ms-duplex="formData.skilled" value="ADV"/>ADV</label>
                    </div>
                </div>

                <div ms-controller="playedGames">
                    <div class="form-group">
                        <label class="col-md-4 control-label">游戏历史</label>
                        <div class="col-md-8">

                            {{--avalon here--}}
                            <div>
                                <ul class="list-group">
                                    <li ms-repeat="games" class="list-group-item row">
                                        <label class="col-md-8">
                                            <span>{%el.name%}</span>
                                            <span class="pull-right">
                                                玩过
                                                <select class="pull-right" ms-duplex="el.experience">
                                                    <option value="1">1天</option>
                                                    <option value="2">2天</option>
                                                    <option value="3">3天</option>
                                                    <option value="4">4天</option>
                                                    <option value="5">5天</option>
                                                    <option value="6">6天</option>
                                                    <option value="7">7天</option>
                                                    <option value="8">8天</option>
                                                    <option value="9">9天</option>
                                                </select>
                                            </span>
                                        </label>
                                        <a class="pull-right" href="javascript:;" ms-on-click="removeGame(el)">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </li>
                                </ul>
                                <div ms-widget="gamePicker, playedGamesGamePicker"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">代表作品</label>
                        <div class="col-md-8">

                            <div>
                                <ul class="list-inline">
                                    <li ms-repeat="games">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" ms-duplex-string="playBest" ms-attr-value="el.name">
                                                {%el.name%}
                                                <span ms-visible="el.experience" class="badge">玩过{%el.experience%}天</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">成就描述</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="achievement" id="achievement"  ms-duplex="formData.achievement"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button id="submitCareer" type="submit" class="btn btn-primary">
                            　提交　
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    require(['app/user/info/career'], function(career) {
        var data = $.parseJSON('<?php echo json_encode($user['career']); ?>');


        career.initCareerForm($.extend({
            played_games: [],
            skilled: []
        }, data));
    });
</script>
@endsection
