@extends("layouts.base")

@section("title", "ログイン")

@section("content")
    <form action="{{ route("login")}}" method="POST">
        <label for="email">email</label>
        <input type="email" name="email" id="email" placeholder="ex) sample@example.com" value="{{ old("email") }}">
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Login">
    </form>
@endsection