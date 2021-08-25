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
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <form method="GET" action="{{ route('lunch.index') }}">
                        @csrf
                        <div class="form-group row justify-content-center">
                            <input class="btn btn-info" type="submit" value="トップ画面">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
