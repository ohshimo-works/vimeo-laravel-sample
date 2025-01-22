<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <h1>@yield("title")</h1>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                @yield("content")
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>
</html>