@extends('app')

@section('content')
<link rel="stylesheet" href="/style/lib/bootstrap/bootstrap-datetimepicker.min.css"/>
<script src="/js/lib/bootstrap/bootstrap-datetimepicker.min.js"></script>
<script src="/js/lib/bootstrap/bootstrap-datetimepicker.zh-CN.js"></script>

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

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/info/identify') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                    <label class="col-md-4 control-label">姓名</label>
                    <div class="col-md-6">
                        @if (isset($user->name) && !empty($user->name))
                        <label class="col-md-6 control-label">{{$user->name}}</label>
                        @else
                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                        @endif

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">身份证</label>
                    <div class="col-md-6">
                        @if (isset($user->identify_card) && !empty($user->identify_card))
                        <label class="col-md-6 control-label">{{substr_replace($user->identify_card, '****', '17', '4')}}</label>
                        @else
                        <input type="text" class="form-control" name="name" value="{{$user->identify_card}}">
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            　下一步
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
