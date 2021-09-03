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
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">店名</label>
                            <input type="text" name="shop_name" class="form-control" id="exampleFormControlInput1" value="{{$Lunch->shop_name}}" placeholder="入力してください">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">価格</label>
                            <input type="text" name="price" class="form-control" id="exampleFormControlInput1" value="{{$Lunch->price}}" placeholder="入力してください">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">料理のジャンル</label>
                            <select name="genre" class="custom-select" value="{{$Lunch->genre}}" aria-label="Default select example">
                                <option value="">選択してください</option>
                                <option value="1" @if ($Lunch->genre === 1) selected @endif>和食</option>
                                <option value="2" @if ($Lunch->genre === 2) selected @endif>洋食</option>
                                <option value="3" @if ($Lunch->genre === 3) selected @endif>中華</option>
                                <option value="4" @if ($Lunch->genre === 4) selected @endif>ラーメン</option>
                                <option value="5" @if ($Lunch->genre === 5) selected @endif>カレー</option>
                                <option value="6" @if ($Lunch->genre === 6) selected @endif>ピザ</option>
                                <option value="7" @if ($Lunch->genre === 7) selected @endif>定食</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputFile">画像登録</label>
                            <div class="custom-file">
                                <input type="file"　name="image" class="custom-file-input" id="inputFile">
                                <label class="custom-file-label" for="inputFile">ファイルを選択してください</label>
                            </div>
                        </div>
                        <input class="btn btn-info" type="submit" value="変更する">
                    </form>
                    <div class="top"><a href="{{route('lunch.show', ['id' => $Lunch->id])}}">戻る</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
