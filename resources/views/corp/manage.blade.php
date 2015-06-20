@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/corp/manage/update') }}">
                    <input type="hidden" name="id" value="{{$corp['_id']}}"/>
                    <h2>基础信息</h2>
                    <div class="form-group">
                        <label class="col-md-2 control-label">队伍昵称</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="nickname" value="{{$corp['nickname']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">赞助商</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="sponsor" value="{{$corp['sponsor']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">队标</label>
                        <div class="col-md-6">
                            <img id="badgePreview" src="{{empty($corp['badge']) ? '/images/badge_default.jpg' : $corp['badge']}}" alt="" width="200" height="200" class="img-thumbnail">
                        </div>
                        <div class="col-md-4">
                            <button id="pickfiles" type="button" class="btn btn-primary">更改队标</button>
                        </div>
                        <input name="badge" type="hidden" id="badge" value="{{$corp['badge']}}"/>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">战队描述</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="description" value="">{{$corp['description']}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary center-block">
                                　提交　
                            </button>
                        </div>
                    </div>
                </form>

                <div>
                    <h2>成员 <small></small></h2>
                    <table class="table table-striped">
                        <tbody>
                        @foreach($corp['members'] as $key => $member)
                            <tr>
                                <th>
                                    <img src="{{empty($member['avatar']) ? '/images/avatar_default.jpg' : $member['avatar']}}" width="32" height="32" alt=""/>
                                </th>
                                <td>
                                    <p class="text-left">
                                        {{$member['nickname']}}
                                    </p>

                                </td>
                                <td>
                                    <p>
                                        tags
                                    </p>
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
                        @endforeach
                        </tbody>
                    </table>
                    <p>
                        <button class="center-block btn btn-lg btn-primary">招募队员</button>
                    </p>
                </div>
            </div>

        </div>
    </div>
    <script>
        require(['app/corp/badge'], function(badge) {
            badge.processUploadBadge('{{$upload_token}}');
        });
    </script>
@endsection