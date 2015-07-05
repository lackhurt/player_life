@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div ms-controller="RecruitListCtrl">
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

                    <table class="table table-bordered  table-hover col-md-12 ">
                        <tr>
                            <td class="col-md-2  text-center">
                                <div class="col-md-12">
                                    <i class="col-md-5">{{$corp->primary_game}}</i>
                                    <i class="col-md-5">{{$corp->nickname}}</i>
                                </div>
                                <div class="col-md-12"><b>主力替补</b></div>
                            </td>
                            <td class="col-md-8">
                                <div class="col-md-8">
                                    急需正式/替补中单各一名，
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-default" href="#" role="button">修改</a>
                                    <a class="btn btn-default" href="#" role="button">显示</a>
                                    <a class="btn btn-default" href="#" role="button">删除</a>
                                </div>
                            </td>
                        </tr>

                    </table>
                </div>

                <div>
                    <div class="row">

                        <h2>招募信息</h2>

                    </div>
                    <div class="row">
                        <form id="infoForm" ms-controller="formCtrl">
                            <div class="form-group">
                                <label>招募标签:</label>
                                <input type="email" class="form-control" placeholder="请填写4字以内的标签">
                            </div>
                            <div class="form-group">
                                <label>招募标题:</label>
                                <input type="email" class="form-control" placeholder="填写个诱人的标题">
                            </div>
                            <div class="form-group">
                                <label>招募开关设置:</label>
                                <input type="radio" name="is_show" class="radio-inline" value="on" checked>开启
                                <input type="radio" name="is_show" class="radio-inline" value="off">关闭
                            </div>
                            <div class="form-group">
                                <label>招募条件设置:</label>

                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <label >角色:</label>

                                        <div class="checkbox">

                                            <label ms-repeat-el="roleCheckBoxList" ms-on-click="roleClick()">
                                                <input type="checkbox" name="" class="radio-inline" value="off"/>{% el.name %}&nbsp;                                        </label>

                                            <label>
                                                <input type="checkbox" name="other" class="radio-inline" value="off"/>其他
                                                <input type="text" name="otherTag" class="radio-inline" value=""/>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">分数:</label>
                                        <label>
                                            <input type="number" name="pointMin" class="radio-inline" value=""/>
                                            &nbsp;--
                                            <input type="number" name="pointMax" class="radio-inline" value=""/>
                                        </label>
                                    </div>
                                    <div class="form-group">

                                        <label>时间:</label>
                                        <label>
                                            <select name="gameTime" id="">
                                                <option value="全天">全天</option>
                                                <option value="上午">上午</option>
                                                <option value="下午">下午</option>
                                                <option value="上半夜">上半夜</option>
                                                <option value="下半夜">下半夜</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="form-group">

                                        <label>性别:</label>

                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="" class="radio-inline" value="off"/>男&nbsp;
                                            </label>
                                            <label>
                                                <input type="radio" name="" class="radio-inline" value="off"/>女&nbsp;
                                            </label>
                                            <label>
                                                <input type="radio" name="" class="radio-inline" value="off"/>其他&nbsp;
                                            </label>
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label>区域:</label>
                                        <div id="location"></div>

                                    </div>

                                </div>


                            </div>
                            <div class="form-group">
                                <label>招募条件说明:</label>
                                <div class="col-md-10 col-md-offset-1">
                                    <textarea name="condition" rows="5" cols="50" placeholder="请填写您对他的要求，比如：
                                    1、三年以上DOTA2经验
                                    2、话少不BB
                                    3、喜欢组团GANK
                                    4、能参加线下活动
                                    5、颜值高
                                    6、男的
                                    7、不16——28岁之间"></textarea>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <button type="button" class="btn btn-primary" ms-on-click="saveClick">保存</button>
                                    <button type="button" class="btn btn-primary" ms-on-click="releaseClick">发布</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script>

        require(['app/corp/recruit'], function () {

        });
    </script>
@endsection