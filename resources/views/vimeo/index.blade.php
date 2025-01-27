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
            <th>詳細リンク</th>
            <th>操作</th>
        </tr>
        @foreach ($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->name }}</td>
            <td><a href="{{route("vimeo.detail", $item->id)}}">DetailPage</a></td>
            <td>
                <div class="d-flex justify-content-between" style="width:max-content;">
                    <button class="btn btn-outline-success modify">変更</button>
                    <button class="btn btn-outline-danger delete">削除</button>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    @endunless
@endsection