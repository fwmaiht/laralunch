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

                    <form method="POST" action="{{route('lunch.store')}}" enctype="multipart/form-data">
                    @csrf
                        店名
                        <input type="text" name="shop_name">
                        <br>
                        価格
                        <input type="text" name="price">
                        <br>
                        ジャンル
                        <select name="genre">
                            <option value="1">和食</option>
                            <option value="2">洋食</option>
                            <option value="3">中華</option>
                            <option value="4">ラーメン</option>
                            <option value="5">カレー</option>
                            <option value="6">ピザ</option>
                            <option value="7">定食</option>
                        </select>
                        <br>
                        画像登録
                        <input type="file" name="image" class="form-controll-file">
                        <br>
                        <input class="btn btn-info" type="submit" value="登録する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
