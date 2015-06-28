@extends('app')

@section('content')
    @if (count($corps) > 0)
        <table class="table table-striped">
            <thead>
            <th>战队名称</th>
            <th>战队简称</th>
            <th>游戏</th>
            <th>创建日期</th>
            </thead>
            <tbody>
            @foreach ($corps as $corp)
                <tr>
                    <td>
                        <a href="/corp/manage?id={{$corp['_id']}}">{{$corp['name'] or '未命名'}}</a>
                    </td>
                    <td>
                        {{$corp['nickname'] or '未命名'}}
                    </td>
                    <td>
                        {{$corp['primary_game'] or '未命名'}}
                    </td>
                    <td>
                        @if (!empty($corp['created_at']))
                            {{date('Y-m-d H:i:s', $corp['created_at']->sec)}}
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection