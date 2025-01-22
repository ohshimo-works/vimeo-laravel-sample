@extends("layouts.base")

@section("title", "Vimeo登録フォーム")

@section("content")
    <h2>動画アップロード</h2>
    <form class="form-group" action="" method="post" enctype="multipart/form-data">
        @csrf
        <label for="video">動画ファイルを指定してください</label>
        <input class="form-control" type="file" name="video" id="video">
        <input class="btn btn-outline-secondary mt-3" type="submit" value="送信">
    </form>
    @unless($items->isEmpty())
    <table class="table">
        <tr>
            <th>ID</th>
            <th>ユーザー名</th>
            <th>動画名</th>
            <th>動画リンク</th>
        </tr>
        @foreach ($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->path }}</td>
        </tr>
        @endforeach
    </table>
    @endunless
@endsection