@extends("layouts.base")

@section("title", "登録")

@section("content")
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route("register")}}" method="POST" id="register">
        @csrf
        <div class="form-floating mt-3">
            <input class="form-control" type="name" name="name" id="name" placeholder="ex) Tom" value="{{ old("name") }}">
            <label for="name">name</label>
        </div>
        <div class="form-floating mt-3">
            <input class="form-control" type="email" name="email" id="email" placeholder="ex) sample@example.com" value="{{ old("email") }}">
            <label for="email">email</label>
        </div>
        <div class="form-floating mt-3">
            <input class="form-control" type="password" name="password" id="password" placeholder="password">
            <label for="password">パスワード</label>
        </div>
        <div class="form-floating mt-3">
            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation">
            <label for="password_confirmation">パスワード確認</label>
        </div>
    </form>
    <div class="d-flex justify-content-between mt-3">
        <input class="btn btn-outline-secondary" type="submit" value="登録" form="register">
        <a href="{{ route("login") }}" class="btn btn-outline-success">ログインはこちら</a>
    </div>
@endsection