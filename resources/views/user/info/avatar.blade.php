@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <img id="avatar" src="{{$user['avatar']}}" alt="" width="200" height="200" class="img-thumbnail">
            </div>
            <div class="col-md-8">
                <button id="pickfiles" type="button" class="btn btn-primary">更改头像</button>
            </div>
        </div>
    </div>
    <script>
        require(['app/user/info/avatar'], function(avatar) {
            avatar.processUploadAvatar('{{$upload_token}}');
        });
    </script>
@endsection