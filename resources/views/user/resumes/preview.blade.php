@extends('app')

@section('content')
<div class="container-fluid" ms-controller="previewResume">
    <div class="row">

    </div>
    <div class="row">
        <div class="col-xs-6" >
            <div class="row margin">
                <div class="col-xs-6"><label for="title">简历标题</label></div>
                <div class="col-xs-6">{%formData.title%}</div>
            </div>
            <div class="row margin">
                <div class="col-xs-6"><label for="nickname">玩家昵称</label></div>
                <div class="col-xs-6">{{empty($user['nickname']) ? '留下昵称' : $user['nickname']}}</div>
            </div>
            <div class="row margin">
                <div class="col-xs-6"><label for="name">玩家姓名</label></div>
                <div class="col-xs-6">{{empty($user['name']) ? '高手无名' : $user['name']}}</div>
            </div>
            <div class="row margin">
                <div class="col-xs-6"><label for="game">游戏名称</label></div>
                <div class="col-xs-6">{%formData.game%}</div>
            </div>
            <div class="row margin">
                <div class="col-xs-6"><label for="platform">所属平台</label></div>
                <div class="col-xs-6">{%formData.platform%}</div>
            </div>
            <div class="row margin">
                <div class="col-xs-6"><label for="net">常用网络</label></div>
                <div class="col-xs-6">{%formData.network_provider%}</div>
            </div>
        </div>

        <div class="col-xs-3">
            <img src="{{empty($member['avatar']) ? '/images/avatar_default.jpg' : $member['avatar']}}" width="150" alt=""/>

        </div>
        <div class="col-xs-3">

        </div>
    </div>
    <div class="row margin">
        <div class="col-xs-1"><label for="adept_hero">擅长角色</label></div>
        <div class="col-xs-1">{%formData.adept_hero%}</div>
        <div class="col-xs-1"><label for="speciality">个人特长</label></div>
        <div class="col-xs-1">{%formData.speciality%}</div>
        <div class="col-xs-1"><label for="integral">积分等级</label></div>
        <div class="col-xs-1">{%formData.integral%}</div>

    </div>
    <div class="row margin">
        <div class="col-xs-1"><label for="skill_level">职业状态</label></div>
        <div class="col-xs-1">{%formData.skill_level%}</div>
        <div class="col-xs-1"><label for="game_time">游戏时长</label></div>
        <div class="col-xs-1">{%formData.game_time%}</div>
        <div class="col-xs-1"></div>
        <div class="col-xs-1"></div>
    </div>
    <div class="row margin">
        <div class="col-xs-1"><label for="game_experience">游戏经历</label></div>
        <div class="col-xs-5">{%formData.game_experience%}</div>
    </div>
    <div class="row margin">
        <div class="col-xs-1"><label for="apply_introduction">应聘简述</label></div>
        <div class="col-xs-5">{%formData.apply_introduction%}</div>
    </div>
    <div class="row margin">
        <div class="col-xs-1"></div>
        <div class="col-xs-5">
            <div class="col-xs-4"><button type="button" class="btn btn-default" ms-on-click="saveResume()">保存</button></div>
            <div class="col-xs-4"><button type="button" class="btn btn-default">返回</button></div>
        </div>
    </div>

</div>
<script>
    require(['app/user/resumes/preview']);
</script>
@endsection