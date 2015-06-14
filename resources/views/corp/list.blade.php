@extends('app')

@section('content')
    <form class="form-horizontal">
        <div class="form-group form-group-lg">
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
                <input class="form-control" type="text" id="formGroupInputLarge" placeholder="搜战队名、玩家名、公会名">
            </div>
            <div class="col-sm-2" for="formGroupInputLarge">
                <a href="#" class="btn btn-primary btn-lg active" role="button">万能嘚搜</a>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">服务器</label>
            <div class="col-sm-10">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default active">
                        <input type="checkbox" autocomplete="off" checked>都行
                    </label>
                    <label class="btn btn-default">
                        <input type="checkbox" autocomplete="off">联通
                    </label>
                    <label class="btn btn-default">
                        <input type="checkbox" autocomplete="off">电信
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">分数</label>
            <div class="col-sm-6">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default active">
                        <input type="checkbox" autocomplete="off" checked>2000以下
                    </label>
                    <label class="btn btn-default">
                        <input type="checkbox" autocomplete="off">2000-3000
                    </label>
                    <label class="btn btn-default">
                        <input type="checkbox" autocomplete="off">3000-4000
                    </label>
                    <label class="btn btn-default">
                        <input type="checkbox" autocomplete="off">4000-5000
                    </label>
                    <label class="btn btn-default">
                        <input type="checkbox" autocomplete="off">5000以上
                    </label>
                </div>
            </div>
            <div class="col-sm-4 form-inline">
                <div class="col-xs-4">
                    <input type="text" class="form-control" placeholder=".col-xs-2">
                </div>
                <div class="col-xs-4">
                    <input type="text" class="form-control" placeholder=".col-xs-3">
                </div>
                <button type="button" class="btn btn-info">确定</button>
            </div>
        </div>
    </form>
    <div>
        <table class="table table-striped">
            <thead>
            <caption>结果</caption>
            <tr>
                <th>战队名</th>
                <th>xxx</th>
                <th>xxxx</th>
                <th>xxxxk</th>
                <th>xxxx</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
            </tr>
            <tr>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
            </tr>
            <tr>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
            </tr>
            <tr>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
            </tr>
            <tr>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
            </tr>
            <tr>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
            </tr>
            <tr>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
            </tr>
            <tr>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
            </tr>
            <tr>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
            </tr>
            <tr>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
                <td>内容</td>
            </tr>
            </tbody>
        </table>
        <nav>
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
