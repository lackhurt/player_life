@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label">手机号</label>
                    <div class="col-md-6">
                        <input placeholder="用于登陆和找回密码" type="text" class="form-control" name="phone" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">短信激活码</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="phone_identifying_code" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">密码</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">重新输入密码</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">验证码</label>
                    <div class="col-md-3">
                        <img src="/captcha" alt=""/>
                    </div>
                    <div class="col-md-3">
                        <input type="password" class="form-control" name="captcha_code">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            注册
                        </button>
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>
@endsection
