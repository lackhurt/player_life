@extends('app')

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th>title</th>
                <th>tag</th>
                <th>角色</th>
                <th>分数范围</th>
                <th>方便时间</th>
                <th>性别</th>
                <th>投递简历</th>
            </tr>
        </thead>
        <tbody>

        @foreach ($corps as $key => $corp)
            @foreach ($corp['recruit'] as $index => $recruit)
            <tr>
                <td>
                    {{$recruit['title']}}
                </td>
                <td>
                    {{$recruit['tag']}}
                </td>
                <td>
                    {{$recruit['other_role_tag']}}
                </td>
                <td>
                    {{$recruit['point_min']}} - {{$recruit['point_max']}}
                </td>
                <td>
                    {{$recruit['play_time']}}
                </td>
                <td>
                    {{$recruit['sex']}}
                </td>
                <td>
                    <button class="js_deliver_resume btn btn-primary" data-game="暗黑破坏神" data-recruit-id="{{$recruit['recruit_id']}}" data-corp-id="{{$corp['_id']}}">投递简历</button>
                </td>
            </tr>
            @endforeach
        @endforeach

        <script>
            require(['app/corp/recruit/list'], function() {
            });
        </script>

        </tbody>
    </table>
@endsection


