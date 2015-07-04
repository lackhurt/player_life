@extends('app')

@section('content')
    <div ms-controller="test">{% show %}</div>
    <div class="container-fluid">
        <div class="row" >
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
                            <div class="col-md-12"><h4>队伍名称 : IG</h4></div>
                            <div class="col-md-12"><h4>游戏名称 : DOTA2</h4></div>
                        </div>
                    </div>

                    <table class="table table-bordered  table-hover col-md-12 ">
                        <tr>
                            <td class="col-md-2  text-center" >
                                <div class="col-md-12">
                                    <i class="col-md-5">DOTA</i>
                                    <i class="col-md-5">IG</i>
                                </div>
                                <div class="col-md-12"><b>主力替补</b></div>
                            </td>
                            <td class="col-md-8" >
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

                        <tr>
                            <td class="col-md-2  text-center" >
                                <div class="col-md-12">
                                    <i class="col-md-5">DOTA</i>
                                    <i class="col-md-5">IG</i>
                                </div>
                                <div class="col-md-12"><b>主力替补</b></div>
                            </td>
                            <td class="col-md-8" >
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
                        <form action="" class="">
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
                                <div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script>

//        function RecruitListCtrl($scope){
//            $scope.list = [
//                {"recruitTag": "GI",
//                    "recruitTitile": "Fast just got faster with Nexus S."},
//                {"recruitTag": "Motorola XOOM™ with Wi-Fi",
//                    "recruitTitile": "The Next, Next Generation tablet."},
//                {"recruitTag": "MOTOROLA XOOM™",
//                    "recruitTitile": "The Next, Next Generation tablet."}
//            ];
//        }
        require(['app/corp/recruit'], function() {

        });
    </script>
@endsection