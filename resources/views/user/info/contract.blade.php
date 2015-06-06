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

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/info/contract') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label">手机号</label>
                    <div class="col-md-6">
                        <label class="col-md-6 control-label">{{$user->phone}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">邮箱</label>
                    <div class="col-md-6">
                        <input type="email" required class="form-control" name="email" value="{{$user->email}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">QQ</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="qq" value="{{$user->qq}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">微信</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="wechat" value="{{$user->wechat}}">
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
<div id="example"></div>
<script>



</script>
@endsection
