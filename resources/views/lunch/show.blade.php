@extends('layouts.app')
<link href="{{ asset('css/show.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="shop_name"> {{$Lunch->shop_name}} </div>
                    @auth
                    @if (auth()->user()->role === 1)
                    <div class="edit">
                        <form method="GET" action="{{route('lunch.edit', ['id' => $Lunch->id])}}">
                            @csrf
                            <input class="btn btn-info" type="submit" value="編集する">
                        </form>
                        <form method="POST" action="{{route('lunch.destroy', ['id' => $Lunch->id])}}">
                            @csrf
                            <input class="btn btn-danger" type="submit" value="削除する">
                        </form>
                    </div>
                    @endif
                    @endauth
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif

                    {{-- {{$Lunch->shop_name}}
                    {{$Lunch->price}}
                    {{$genre}}
                    {{$name->name}} --}}

                    @foreach ($comments as $comment)
                    <div class="name">{{ $comment->user->name }}</div>さんのコメント
                    <div class="created_at">{{ $comment->created_at }}</div>
                    @if (auth()->user()->name === $comment->user->name)
                        <form method="POST" class="del_comment" action="{{route('comment.destroy', ['id' => $comment->id])}}">
                            @csrf
                            <input class="btn btn-danger" type="submit" value="削除する">
                        </form>
                    @endif
                    <div class="comment">{{ $comment->comment }}</div>
                    @endforeach
                    <form method="POST" action="{{route('comment.store', ['id' => $Lunch->id])}}">
                        @csrf
                        コメント<br>
                        <textarea name="comment" style="margin-bottom: 10px;"></textarea>
                        <input class="btn btn-info comment_submit" type="submit" value="登録する">
                    </form>
                    <a class="top" href="{{route('lunch.index')}}">トップ画面</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
