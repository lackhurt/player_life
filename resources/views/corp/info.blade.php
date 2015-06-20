@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <form>
                    <fieldset>
                        <h2>基础信息 <small>有史以来最能吹牛逼之战队</small></h2>
                        <div>
                            <img width="128" height="128" src="/images/badge_default.jpg" alt="" class="img-thumbnail"/>
                            <button class="btn btn-primary">修改头像</button>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <h2>管理员 <small>我们是管理员</small></h2>
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th>
                                        <img class="img-rounded" src="/images/avatar_default.jpg" width="32" height="32" alt=""/>
                                    </th>
                                    <td>
                                        管理员大人
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <img src="/images/avatar_default.jpg" width="32" height="32" alt=""/>
                                    </th>
                                    <td>
                                        管理员大人
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <h2>成员 <small></small></h2>
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th>
                                        <img src="/images/avatar_default.jpg" width="32" height="32" alt=""/>
                                    </th>
                                    <td>
                                        <p class="text-left">
                                            管理员大人
                                        </p>

                                    </td>
                                    <td>
                                        中单
                                    </td>
                                    <td align="right">
                                        <div class="btn-group">
                                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                管理&nbsp;<span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">辞去管理员</a></li>
                                                <li><a href="#">设置为管理员</a></li>
                                                <li><a href="#">移除管理员权限</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">踢出</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <p>
                                <button class="center-block btn btn-lg btn-primary">招募队员</button>
                            </p>
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>
    </div>
    <script>
    </script>
@endsection