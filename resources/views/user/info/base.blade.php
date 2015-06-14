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

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/info/base') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label">ID</label>
                    <div class="col-md-6">
                        <label class="col-md-6 control-label">{{$user->id}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">昵称</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nickname" value="{{$user->nickname}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">性别</label>
                    <div class="col-md-6 checkbox-inline">
                        <label>
                            <input type="radio" name="gender" id="optionsRadios3" value="m" checked>
                            男
                        </label>
                        <label>
                            <input type="radio" name="gender" id="optionsRadios3" value="f">
                            女
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">生日</label>
                    <div class="col-md-6">
                        <div class="input-group date form_date col-md-8" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input class="form-control"  type="text" name="birthday" value="{{date('Y-m-d', $user->birthday)}}" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        <input class="col-md-4" type="hidden" id="dtp_input2" value="{{date('Y-m-d', $user->birthday)}}" /><br/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">出生地</label>
                    <div id="bornDisctrict">
                    </div>
                </div>
                <div class="form-group" ms-controller="locationAddress">
                    <label class="col-md-4 control-label">所在地</label>
                    <div id="location"></div>
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



    require(['app/user/info/base'], function() {

    });



</script>
@endsection
