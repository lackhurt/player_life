@extends('app')

@section('content')
<form class="form-horizontal">
    <div class="form-group form-group-lg">
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
            <input class="form-control" type="text" id="formGroupInputLarge" placeholder="搜游戏，搜大神，搜战队，搜搜搜">
        </div>
        <div class="col-sm-2" for="formGroupInputLarge">
            <a href="#" class="btn btn-primary btn-lg active" role="button">万能嘚搜</a>
        </div>
    </div>
</form>
<ul class="nav nav-pills" role="tablist">
    <li role="presentation" class="active"><a href="#">人气游戏</a></li>
    <li role="presentation"><a href="#">人气战队</a></li>
    <li role="presentation"><a href="#">人气公会</a></li>
    <li role="presentation"><a href="#">骨灰大神</a></li>
    <li role="presentation"><a href="#">店长推荐</a></li>
</ul>
@endsection
