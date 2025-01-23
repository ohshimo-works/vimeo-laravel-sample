@extends("layouts.base")

@section("title", "ログイン")

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
    <form action="{{ route("login")}}" method="POST" id="login">
        @csrf
        <div class="form-floating mt-3">
            <input class="form-control" type="email" name="email" id="email" placeholder="ex) sample@example.com" value="{{ old("email") }}">
            <label for="email">email</label>
        </div>
        <div class="form-floating mt-3">
            <input class="form-control" type="password" name="password" id="password" placeholder="password">
            <label for="password">password</label>
        </div>
    </form>
    <div class="d-flex justify-content-between mt-3">
        <input class="btn btn-outline-secondary" type="submit" value="Login" form="login">
        <a href="{{ route("register") }}" class="btn btn-outline-success">新規登録はこちら</a>
    </div>

@endsection