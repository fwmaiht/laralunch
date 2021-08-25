@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif
                    <form method="POST" action="{{route('lunch.update', ['id' => $Lunch->id])}}" enctype="multipart/form-data">
                    @csrf
                        画像
                        <input type="file" name="image">
                        <br>
                        店名
                        <input type="text" name="shop_name" value="{{$Lunch->shop_name}}">
                        <br>
                        料金目安
                        <input type="text" name="price" value="{{$Lunch->price}}">
                        <br>
                        カテゴリー
                        <select name="genre" value="{{$Lunch->genre}}">
                            <option value="">選択してください</option>
                            <option value="1" @if ($Lunch->genre === 1) selected @endif>和食</option>
                            <option value="2" @if ($Lunch->genre === 2) selected @endif>洋食</option>
                            <option value="3" @if ($Lunch->genre === 3) selected @endif>中華</option>
                            <option value="4" @if ($Lunch->genre === 4) selected @endif>ラーメン</option>
                            <option value="5" @if ($Lunch->genre === 5) selected @endif>カレー</option>
                            <option value="6" @if ($Lunch->genre === 6) selected @endif>ピザ</option>
                            <option value="7" @if ($Lunch->genre === 7) selected @endif>定食</option>
                        </select>
                        <br>
                        <input class="btn btn-info" type="submit" value="変更する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
