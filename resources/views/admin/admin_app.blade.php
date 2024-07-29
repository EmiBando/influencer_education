<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: "Helvetica Neue",
                Arial,
                "Hiragino Kaku Gothic ProN",
                "Hiragino Sans",
                Meiryo,
                sans-serif;
        }

        header {
            background-color: aqua;
            padding: 30px 0;
        }
    </style>
    <title>チーム開発</title>
</head>
<body>
<header>
    <div class="container mt-2"> <!-- 高さ調整 -->
        <a class="btn btn-secondary" style="font-size: 1.5rem; margin-right: 10px;" href="{{ url('admin_class') }}">授業管理</a>
        <a class="btn btn-secondary" style="font-size: 1.5rem; margin-right: 10px;" href="{{ url('admin_news') }}">お知らせ管理</a>
        <a class="btn btn-secondary" style="font-size: 1.5rem; margin-right: 670px;" href="{{ url('admin_banner') }}">バナー管理</a>
        <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a class="btn btn-secondary" style="font-size: 1.5rem;" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
    </div>
</header>
<div class="container mt-0"> <!-- 高さ調整 -->
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
