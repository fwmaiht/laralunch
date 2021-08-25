@extends('layouts.app')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    登録店一覧
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('lunch.create') }}">
                    @csrf
                        @auth
                        @if (auth()->user()->role === 1)
                            <button type="submit" class="btn btn-primary">新規登録</button>
                        @endif
                        @endauth
                    </form>
                    @if ($random_shop)
                        今日のランチは ”{{ $random_shop->shop_name}}” に決まり
                    @else
                        行きたいお店がない...
                    @endif
                    <div class="container">
                        @foreach ($lunch_recs as $lunch_rec)
                        <div class="shop" href="{{ route('lunch.show', ['id' => $lunch_rec->id]) }}">
                            <a class="link" href="{{ route('lunch.show', ['id' => $lunch_rec->id]) }}">
                                <div class="image">
                                    <img src="{{ '/storage/' . $lunch_rec->image}}">
                                </div>
                                <div class="title">
                                    <div class="name">
                                        {{$lunch_rec->shop_name}}
                                    </div>
                            </a>
                                    <nice-component :post="{{ json_encode($lunch_rec->id) }}"></nice-component>
                                </div>
                            <div class="info">
                                <div class="genre">
                                    @if ($lunch_rec->genre === 1) 和食　
                                    @elseif ($lunch_rec->genre === 2) 洋食　
                                    @elseif ($lunch_rec->genre === 3) 中華　
                                    @elseif ($lunch_rec->genre === 4) ラーメン　
                                    @elseif ($lunch_rec->genre === 5) カレー　
                                    @elseif ($lunch_rec->genre === 6) ピザ　
                                    @elseif ($lunch_rec->genre === 7) 定食　 @endif
                                </div>
                                <div class="price">
                                    目安:￥{{$lunch_rec->price}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
