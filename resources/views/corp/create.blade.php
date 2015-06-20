@extends('app')

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/corp/create') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label">队伍名称</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">队伍昵称</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="nickname" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">赞助商</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="sponsor" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">竞技游戏</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="primary_game" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">队标</label>
                        <div class="col-md-3">
                            <img id="badgePreview" src="/images/badge_default.jpg" alt="" width="200" height="200" class="img-thumbnail">
                        </div>
                        <div class="col-md-3">
                            <button id="pickfiles" type="button" class="btn btn-primary">更改队标</button>
                        </div>
                        <input name="badge" type="hidden" id="badge"/>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">战队描述</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="description" value=""></textarea>
                        </div>
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
        require(['app/corp/badge'], function(badge) {
            badge.processUploadBadge('{{$upload_token}}');
        });
    </script>
@endsection