<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style type="text/css">
        body {
            font-family: "Helvetica Neue", Arial, "Hiragino Kaku Gothic ProN", "Hiragino Sans", Meiryo, sans-serif;
        }

        header {
            background-color: orange;
            padding: 30px 0;
        }
    </style>
    <title>チーム開発</title>
</head>
<body>
<header>
    <div class="container mt-2"> <!-- 高さ調整 -->
        <a class="btn btn-secondary" style="font-size: 1.5rem; margin-right: 10px;" href="{{ url('user_timetable') }}">時間割</a>
        <a class="btn btn-secondary" style="font-size: 1.5rem; margin-right: 10px;" href="{{ url('user_progress') }}">授業進捗</a>
        <a class="btn btn-secondary" style="font-size: 1.5rem; margin-right: 670px;" href="{{ url('user_profile') }}">プロフィール設定</a>
        <form id="logout-form" action="{{ url('user/logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <button class="btn btn-secondary" style="font-size: 1.5rem;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</button>
    </div>
</header>
<div class="container mt-5">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
