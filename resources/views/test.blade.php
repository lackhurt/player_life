@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Test</div>

                    <form action="test/tmp" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="upload_token" value="{{ $token }}"/>
                        <input type="file" name="test_file"/>
                        <input type="submit"/>
                    </form>

                    <form action="/test/confirm" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="upload_token" value="{{ $token }}"/>
                        <input type="file" name="test_file"/>
                        <input type="submit"/>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection