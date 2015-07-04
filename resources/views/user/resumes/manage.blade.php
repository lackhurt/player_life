@extends('app')

@section('content')
<style>
    .margin {
        margin-top: 5px;
        margin-bottom: 5px;
    }
</style>
<div class="container-fluid" ms-controller="resumes">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="row margin">
    <div class="col-xs-6" >
        1243{% test %}
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
            <th class="col-xs-4">简历名称</th>
            <th class="col-xs-2">修改</th>
            <th class="col-xs-1">预览</th>
            <th class="col-xs-1">设置</th>
            <th class="col-xs-2">动作</th>
        </tr>

        </thead>
        <tbody>
        <tr>
            <td><strong>DOTA2</strong></td>
            <td>前职业选手，带你装逼带你飞，天梯一局100，普通一局60，支持小费，买5赠1</td>
            <td>修改</td>
            <td>预览</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        开放 <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">关闭</a></li>
                    </ul>
                </div>
            </td>
            <td>
                <button type="button" class="btn btn-default sub-resume" ms-on-click="avalonAlert(11111)">
                    投递简历
                </button>
            </td>
        </tr>
        <tr>
            <td><strong>DOTA2</strong></td>
            <td>前职业选手，带你装逼带你飞，天梯一局100，普通一局60，支持小费，买5赠1</td>
            <td>修改</td>
            <td>预览</td>
            <td>
                <select name="" id="">
                    <option value="">开放</option>
                    <option value="">关闭</option>
                </select>
            </td>
            <td>
                <button type="button" class="btn btn-default sub-resume" ms-on-click="avalonAlert(11111)">
                    投递简历
                </button>
            </td>
        </tr>
        <tr>
            <td><strong>DOTA2</strong></td>
            <td>前职业选手，带你装逼带你飞，天梯一局100，普通一局60，支持小费，买5赠1</td>
            <td>修改</td>
            <td>预览</td>
            <td>
                <select name="" id="">
                    <option value="">开放</option>
                    <option value="">关闭</option>
                </select>
            </td>
            <td>
                <button type="button" class="btn btn-default sub-resume" ms-on-click="avalonAlert(11111)">
                    投递简历
                </button>
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
            <button type="button" class="btn btn-default">1</button>
            <button type="button" class="btn btn-default">2</button>
            <button type="button" class="btn btn-default">3</button>
        </div>
    </div>
</div>
<div class="row margin">
    <form class="form-horizontal" method="POST" action="{{ url('/user/resume/create') }}">
        <div class="row">
            <div class="col-xs-4">
                <label for="game">选择游戏</label>
            </div>
            <div class="col-xs-6">
                <select class="form-control" id="" name="game">
                    <option>DOTA2</option>
                    <option>LOL</option>
                    <option>WOW</option>
                    <option>梦幻西游</option>
                    <option>穿越火线</option>
                </select>
            </div>

            <div class="col-xs-2"></div>
        </div>
        <div class="row margin">
            <div class="col-xs-4">
                <label for="title">简历标题</label>
            </div>
            <div class="col-xs-6">
                <input class="form-control" type="text" name="title" id="title"/>
            </div>

            <div class="col-xs-2">{% test %}</div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="platform">所属平台</label>
            </div>
            <div class="col-xs-6">
                <input class="form-control" type="text" name="platform" id="platform"/>
            </div>

            <div class="col-xs-2"></div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="networkProvider">常用网络</label>
            </div>
            <div class="col-xs-6">
                <input class="form-control" type="text" name="network_provider" id="networkProvider"/>
            </div>

            <div class="col-xs-2"></div>
        </div>
        <div class="row margin">
            <div class="col-xs-4">
                <label for="adeptHero">擅长英雄</label>
            </div>
            <div class="col-xs-6">
                <input class="form-control" type="text" name="adept_hero" id="adeptHero"/>
            </div>

            <div class="col-xs-2"></div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="speciality">个人特长</label>
            </div>
            <div class="col-xs-6">
                <input class="form-control" type="text" name="speciality" id="speciality"/>
            </div>

            <div class="col-xs-2"></div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="integral">积分等级</label>
            </div>
            <div class="col-xs-6">
                <input class="form-control" ms-duplex='text' type="text" name="integral" id="integral"/>
            </div>

            <div class="col-xs-2"></div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="skillLevel">技能水平</label>
            </div>
            <div class="col-xs-6">
                <input class="" type="radio" name="skill_level" id="skillLevel"/>菜鸟&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="" type="radio" name="skill_level" id="skillLevel"/>普通&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="" type="radio" name="skill_level" id="skillLevel"/>高手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="" type="radio" name="skill_level" id="skillLevel"/>骨灰&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="" type="radio" name="skill_level" id="skillLevel"/>职业
            </div>

            <div class="col-xs-2"></div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="gameTime">游戏时间</label>
            </div>
            <div class="col-xs-6">
                <select class="form-control" id="" name="game_time">
<!--                    <option>1年</option>-->
<!--                    <option>2年</option>-->
<!--                    <option>3年</option>-->
<!--                    <option>4年</option>-->
<!--                    <option>5年</option>-->
<!--                    <option>6年</option>-->
<!--                    <option>7年</option>-->
<!--                    <option>7年以上</option>-->
                    <option ms-attr-value="el.test" ms-repeat-xl="list">{%xl.name%}</option>
                </select>
            </div>

            <div class="col-xs-2"></div>
        </div>

        <div class="row margin">
            <div class="col-xs-4">
                <label for="applyIntroduction">应聘简述</label>
            </div>
            <div class="col-xs-6">
                <textarea class="form-control" name="apply_introduction" id="applyIntroduction" rows="5">前职业选手，带你装逼带你飞，天梯一局100，普通一局60，支持小费，买5赠1待打天梯5000——5500
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
                          rows="5">TI1亚军TI2冠军各种吹牛逼</textarea>
            </div>

            <div class="col-xs-2"></div>
        </div>
        <div class="row margin">
            <div class="col-xs-4">
                <label for="resumeStatus">简历状态</label>
            </div>
            <div class="col-xs-6">
                <select class="form-control" id="resumeStatus" name="resume_status">
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
                <select class="form-control" id="privacySetting" name="privacy_setting">
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
                <button type="button" class="btn btn-default" ms-on-click="avalonAlert(11111)">保存设置</button>
            </div>
            <div class="col-xs-4">
                <button type="button" class="btn btn-default">预览简历</button>
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