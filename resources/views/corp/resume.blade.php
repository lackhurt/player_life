@extends('app')

@section('content')

    <div>
        <h2>收到的简历</h2>
        <table class="table table-striped">
            <thead>
                <th>姓名</th>
                <th>性别</th>
                <th>年龄</th>
                <th>地域</th>
                <th>联系方式</th>
                <th>级别/分数</th>
            </thead>
            <tbody>
            @foreach ($resumes as $resume)

            @endforeach
            </tbody>
        </table>

    </div>


    <h2>通过的简历</h2>


@endsection
