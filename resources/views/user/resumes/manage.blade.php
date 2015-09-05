@extends('app')

@section('content')
<style>
    .margin {
        margin-top: 5px;
        margin-bottom: 5px;
    }
</style>
<div class="container-fluid" ms-controller="resumesCtrl">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="row margin">
    <div class="col-xs-6" >
    </div>

    <div class="col-xs-3">
        <img src="{{empty($member['avatar']) ? '/images/avatar_default.jpg' : $member['avatar']}}" width="150" alt=""/>

    </div>
    <div class="col-xs-3">

    </div>
</div>

<div class="row">
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="col-xs-2">所属游戏</th>
            <th class="col-xs-3">简历名称</th>
            <th class="col-xs-2">修改</th>
            <th class="col-xs-1">预览</th>
            <th class="col-xs-1">设置</th>
            <th class="col-xs-3">动作</th>
        </tr>

        </thead>
        <tbody>
        <tr ms-repeat-el="resumeList" ms-visible="isVisible(page)">
            <td><strong>{%$key%}</strong></td>
            <td><a href="javascript:void(0)">{%$val.title%}</a></td>
            <td>
                <a href="javascript:void(0)" ms-on-click="updateResume($key)">修改</a>
            </td>
            <td>
                <button type="button" class="btn btn-default" ms-on-click="previewResume($key)">
                    预览
                </button>
            </td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true"   aria-expanded="false">
                        {%$val.resume_status == 1 ? '开放' : '关闭'%}<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a ms-on-click="modifyResumeStatus($val.game, $val.resume_status)">{%$val.resume_status == 1 ? '关闭' : '开放'%}</a></li>
                    </ul>
                </div>
            </td>
            <td>
                <button type="button" class="btn btn-default" ms-on-click="deleteResume($key)">投递简历</button>
                <button type="button" class="btn btn-default" ms-on-click="deleteResume($key)">删除</button>
            </td>

        </tr>
        
        </tbody>
    </table>
</div>
<div class="row margin">
    <div class="col-xs-8">
        <button type="button" class="btn btn-default">创建简历</button>
    </div>
    <div class="col-xs-4">
        <div class="btn-group" role="group" aria-label="First group">
            <button type="button" class="btn btn-default" >1</button>
            <button type="button" class="btn btn-default" >2</button>
        </div>
    </div>
</div>
<div class="row margin">
    <form class="form-horizontal" method="POST" action="{{ url('/user/resume/create') }}" ms-controller="formCtrl">
        <div class="row">
            <div class="col-xs-4">
                <label for="game">选择游戏</label>
            </div>
            <div class="col-xs-6">
                <a name="resume-head"></a>
                <input type="text" class="form-control" name="game" ms-duplex="game"  id="game" readonly value="">
            </div>

            <div class="col-xs-2"></div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="title">简历标题</label>
            </div>
            <div class="col-xs-6">
                <input class="form-control" type="text" name="title" ms-duplex="title"/>
            </div>

            <div class="col-xs-2"></div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="platform">所属平台</label>
            </div>
            <div class="col-xs-6">
                <input class="form-control" type="text" name="platform" ms-duplex="platform"/>
            </div>

            <div class="col-xs-2"></div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="networkProvider">常用网络</label>
            </div>
            <div class="col-xs-6">
                <input class="form-control" type="text" name="network_provider" ms-duplex="network_provider"/>
            </div>

            <div class="col-xs-2"></div>
        </div>
        <div class="row margin">
            <div class="col-xs-4">
                <label for="adeptHero">擅长英雄</label>
            </div>
            <div class="col-xs-6">
                <input class="form-control" type="text" name="adept_hero" ms-duplex="adept_hero"/>
            </div>

            <div class="col-xs-2"></div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="speciality">个人特长</label>
            </div>
            <div class="col-xs-6">
                <input class="form-control" type="text" name="speciality" ms-duplex="speciality"/>
            </div>

            <div class="col-xs-2"></div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="integral">积分等级</label>
            </div>
            <div class="col-xs-6">
                <input class="form-control" type="text" name="integral" ms-duplex="integral"/>
            </div>

            <div class="col-xs-2"></div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="skillLevel">技能水平</label>
            </div>
            <div class="col-xs-6">
                <input class="" type="radio"  value="菜鸟" ms-duplex-string="skill_level"/>菜鸟&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="" type="radio"  value='普通' ms-duplex-string="skill_level"/>普通&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="" type="radio"  value='高手' ms-duplex-string="skill_level"/>高手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="" type="radio"  value='骨灰' ms-duplex-string="skill_level"/>骨灰&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="" type="radio"  value='职业' ms-duplex-string="skill_level"/>职业
            </div>

            <div class="col-xs-2"></div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="gameTime">游戏时间</label>
            </div>
            <div class="col-xs-6">
                <select class="form-control" id="gameTime" ms-duplex="game_time" name="game_time">
                    <option ms-attr-value="xl.name" ms-repeat-xl="list">{%xl.name%}</option>
                </select>
            </div>

            <div class="col-xs-2"></div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="applyIntroduction">应聘简述</label>
            </div>
            <div class="col-xs-6">
                <textarea class="form-control" name="apply_introduction" id="applyIntroduction" rows="5" ms-duplex-html="apply_introduction">前职业选手，带你装逼带你飞，天梯一局100，普通一局60，支持小费，买5赠1待打天梯5000——5500
                    1500块。。。。。</textarea>
            </div>

            <div class="col-xs-2"></div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="gameExperience">游戏经历</label>
            </div>
            <div class="col-xs-6">
                <textarea class="form-control" name="game_experience" id="gameExperience"
                          rows="5" ms-duplex-html="game_experience">TI1亚军TI2冠军各种吹牛逼</textarea>
            </div>

            <div class="col-xs-2"></div>
        </div>
        <div class="row margin">
            <div class="col-xs-4">
                <label for="resumeStatus">简历状态</label>
            </div>
            <div class="col-xs-6">
                <select class="form-control" ms-duplex="resume_status" id="resumeStatus" name="resume_status">
                    <option value="1">开放</option>
                    <option value="2">关闭</option>
                </select>
            </div>

            <div class="col-xs-2"></div>
        </div>
        <div class="row margin">
            <div class="col-xs-4">
                <label for="privacySetting">隐私设置</label>
            </div>
            <div class="col-xs-6">
                <select class="form-control" id="privacySetting" name="privacy_setting" ms-duplex="privacy_setting">
                    <option value="1">公开放手机</option>
                    <option value="2">公开放姓名</option>
                    <option value="3">显示姓名和手机</option>
                    <option value="4">不开放姓名手机</option>
                </select>
            </div>

            <div class="col-xs-2"></div>
        </div>
        <div class="row margin">
            <div class="col-xs-4">

            </div>
            <div class="col-xs-4">
                <button type="button" class="btn btn-default" ms-on-click="resumesSubmit()">保存设置</button>
            </div>
            <div class="col-xs-4">
                <button type="button" ms-on-click="previewResume()" class="btn btn-default">预览简历</button>
            </div>
        </div>
    </form>


</div>


</div>


</div>
</div>

<script>
        require(['app/user/resumes/manage'], function() {

        });
</script>
@endsection