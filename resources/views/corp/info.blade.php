@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <form>
                    <fieldset>
                        <h2>基础信息 <small>{{$corp->description}}</small></h2>
                        <div>
                            <img width="128" height="128" src="/images/badge_default.jpg" alt="" class="img-thumbnail"/>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <h2>管理员 <small>我们是管理员</small></h2>
                            <table class="table table-striped">
                                <tbody>
                                    @foreach($corp['members'] as $key => $member)

                                    <tr>
                                        @if(!empty($member['is_admin']))
                                        <th>
                                            <img src="{{empty($member['avatar']) ? '/images/avatar_default.jpg' : $member['avatar']}}" width="32" height="32" alt=""/>
                                        </th>
                                        <td>
                                                {{$member['nickname']}}
                                        </td>
                                        @endif
                                    </tr>


                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
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
                                            @if(!empty($member['is_admin']))
                                                管理员大人
                                            @else
                                                小兵
                                            @endif

                                        </p>

                                    </td>
                                    <td>
                                        @if(!empty($member['tags']))
                                        {{$member['tags']}}
                                        @else
                                        无
                                        @endif
                                    </td>

                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <p>
                                <button class="center-block btn btn-lg btn-primary @if($isBelongCorp) hidden @endif">投递简历</button>
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