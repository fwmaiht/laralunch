@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規登録</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{route('lunch.store')}}" enctype="multipart/form-data">
                    @csrf

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">店名</label>
                            <input type="text" name="shop_name" class="form-control" id="exampleFormControlInput1" placeholder="入力してください">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">価格</label>
                            <input type="text" name="price" class="form-control" id="exampleFormControlInput1" placeholder="入力してください">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">料理のジャンル</label>
                            <select name="genre" class="custom-select" aria-label="Default select example">
                                <option selected>選択してください</option>
                                <option value="1">和食</option>
                                <option value="2">洋食</option>
                                <option value="3">中華</option>
                                <option value="4">ラーメン</option>
                                <option value="5">カレー</option>
                                <option value="6">ピザ</option>
                                <option value="7">定食</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputFile">画像登録</label>
                            <div class="custom-file">
                                <input type="file"　name="image" class="custom-file-input" id="inputFile">
                                <label class="custom-file-label" for="inputFile">ファイルを選択してください</label>
                            </div>
                        </div>
                        <input class="btn btn-info" type="submit" value="登録する">
                    </form>
                    <div class="top"><a href="{{route('lunch.index')}}">トップ画面</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
