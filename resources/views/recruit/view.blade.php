@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div>
                    <input type="hidden" name="id" value="$corp['_id']"/>

                    <div class="row">
                        <h2>招募列表</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <img id="badgePreview" src="{{'/images/badge_default.jpg'}}" alt="" width="100" height="100"
                                 class="img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <div class="col-md-12"><h4>队伍名称 : {{$corp->name}}</h4></div>
                            <div class="col-md-12"><h4>游戏名称 : {{$corp->primary_game}}</h4></div>
                        </div>
                    </div>

                </div>

                <div ms-controller="infoCtrl" >
                    <div class="row">
                        <h2>招募信息</h2>
                    </div>
                    <div class="row">

                        <div class="form-group">
                            <label>招募标签: </label>
                            <label>{%info.tag%}</label>
                        </div>
                        <div class="form-group">
                            <label>招募标题: </label>
                            <label>{%info.title%}</label>
                        </div>

                        <div class="form-group">

                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
                                    <label>角色: </label>

                                    <label ms-repeat-el="info.role_checked_list">{% el %}　</label>

                                </div>
                                <div class="form-group">
                                    <label for="">分数:</label>
                                    <label>
                                        {%info.point_min%} - {%info.point_max%}
                                    </label>
                                </div>
                                <div class="form-group">

                                    <label>时间:</label>
                                    <label>
                                        {%info.play_time%}
                                    </label>
                                </div>
                                <div class="form-group">

                                    <label>性别:</label>
                                    <label>{%info.sex=='other'?'其他':(info.sex=='man'?'男':'女')%}</label>

                                </div>

                                <div class="form-group">
                                    <label>区域:</label>
                                    <label>{% info.province_name %} - {% info.city_name%}</label>

                                </div>
                                <div class="form-group">
                                    <label>招募条件说明:</label>

                                    <div class="col-md-10 col-md-offset-1">
                                        {% info.info?info.info:'这家伙很懒，啥也没写' %}
                                    </div>

                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary">管理</button>
                                    <button type="button" class="btn btn-primary">投递简历</button>
                                    <button type="button" class="btn btn-primary" ms-click="clickClose">关闭</button>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <script>

        require(['app/recruit/view'], function (action) {
            var recruitInfo = JSON.parse(sessionStorage.getItem('recruitInfo'))
            if(recruitInfo){
                action.setInfo(recruitInfo);
            }
        });
    </script>
@endsection