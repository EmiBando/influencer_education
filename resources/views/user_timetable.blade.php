<!-- 現在エラー解決のための仮のページレイアウトにしています -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Timetable</title>
</head>
<body>
    <h1>User Timetable</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>学年ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($curriculums as $curriculum)
            <tr>
                <td>{{ $curriculum->id }}</td>
                <td>{{ $curriculum->title }}</td>
                <td>{{ $curriculum->grade_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>


<!-- 下記がもともと制作していたレイアウトです -->
@extends('user_app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="text-left">
                <a style="color: black; font-size: 24px; text-decoration: none;" href="{{ url('/user_top') }}">←戻る</a>
            </div>
            <div class="schedule-container text-center"> <!-- text-center を追加 -->
                <div class="year-month-display" id="yearMonthDisplay">
                    <span id="prevYearMonth" style="font-size: 24px;">&lt;</span>
                    <span id="currentYearMonth" style="font-size: 24px;">2023年7月</span>
                    <span id="nextYearMonth" style="font-size: 24px;">&gt;</span>
                </div>
                <div style="margin-bottom: 50px;"></div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center text-center">
        <div class="col-lg-2 text-center">
            <div class="col-sm-12"> <!-- ボタンを縦に配置する列 -->
                <div class="btn-group-vertical">
                    <a href="#" class="btn btn-primary" style="margin-bottom: 20px; background-color: #00FFFF; border-color: #7d7d7d; border-radius: 20px;">小学１年生</a>
                    <a href="#" class="btn btn-primary" style="margin-bottom: 20px; background-color: #00FFFF; border-color: #7d7d7d; border-radius: 20px;">小学２年生</a>
                    <a href="#" class="btn btn-primary" style="margin-bottom: 20px; background-color: #00FFFF; border-color: #7d7d7d; border-radius: 20px;">小学３年生</a>
                    <a href="#" class="btn btn-primary" style="margin-bottom: 20px; background-color: #00FFFF; border-color: #7d7d7d; border-radius: 20px;">小学４年生</a>
                    <a href="#" class="btn btn-primary" style="margin-bottom: 20px; background-color: #00FFFF; border-color: #7d7d7d; border-radius: 20px;">小学５年生</a>
                    <a href="#" class="btn btn-primary" style="margin-bottom: 20px; background-color: #00FFFF; border-color: #7d7d7d; border-radius: 20px;">小学６年生</a>
                    <a href="#" class="btn btn-primary" style="margin-bottom: 20px; background-color: #00bfff; border-color: #7d7d7d; border-radius: 20px;">中学１年生</a>
                    <a href="#" class="btn btn-primary" style="margin-bottom: 20px; background-color: #00bfff; border-color: #7d7d7d; border-radius: 20px;">中学２年生</a>
                    <a href="#" class="btn btn-primary" style="margin-bottom: 20px; background-color: #00bfff; border-color: #7d7d7d; border-radius: 20px;">中学３年生</a>
                    <a href="#" class="btn btn-primary" style="margin-bottom: 20px; background-color: #7fff00; border-color: #7d7d7d; border-radius: 20px;">高校１年生</a>
                    <a href="#" class="btn btn-primary" style="margin-bottom: 20px; background-color: #7fff00; border-color: #7d7d7d; border-radius: 20px;">高校２年生</a>
                    <a href="#" class="btn btn-primary" style="margin-bottom: 20px; background-color: #7fff00; border-color: #7d7d7d; border-radius: 20px;">高校３年生</a>
                </div>
            </div>
        </div>

        <div class="col-lg-10">
            <div class="row justify-content-center">
                <div class="col-sm-3 mb-5 mr-3">
                    <div class="border p-3 h-100">
                        <img src="画像のURL" alt="画像の説明" class="img-fluid">
                        <h2 class="mt-3 mb-2" style="font-size: 20px;">授業タイトル</h2>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                    </div>
                </div>
                <div class="col-sm-3 mb-5 mr-3">
                    <div class="border p-3 h-100">
                        <img src="画像のURL" alt="画像の説明" class="img-fluid">
                        <h2 class="mt-3 mb-2" style="font-size: 20px;">授業タイトル</h2>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                    </div>
                </div>
                <div class="col-sm-3 mb-5 mr-3">
                    <div class="border p-3 h-100">
                        <img src="画像のURL" alt="画像の説明" class="img-fluid">
                        <h2 class="mt-3 mb-2" style="font-size: 20px;">授業タイトル</h2>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-3 mb-5 mr-3">
                    <div class="border p-3 h-100">
                        <img src="画像のURL" alt="画像の説明" class="img-fluid">
                        <h2 class="mt-3 mb-2" style="font-size: 20px;">授業タイトル</h2>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                    </div>
                </div>
                <div class="col-sm-3 mb-5 mr-3">
                    <div class="border p-3 h-100">
                        <img src="画像のURL" alt="画像の説明" class="img-fluid">
                        <h2 class="mt-3 mb-2" style="font-size: 20px;">授業タイトル</h2>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                    </div>
                </div>
                <div class="col-sm-3 mb-5 mr-3">
                    <div class="border p-3 h-100">
                        <img src="画像のURL" alt="画像の説明" class="img-fluid">
                        <h2 class="mt-3 mb-2" style="font-size: 20px;">授業タイトル</h2>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                        <p class="mb-0">7月13日  14:00~15:00</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        const yearMonths = ["2023年1月", "2023年2月", "2023年3月", "2023年4月", "2023年5月", "2023年6月", "2023年7月", "2023年8月", "2023年9月", "2023年10月", "2023年11月", "2023年12月"];
        let currentYearMonthIndex = 6; // 7月を初期表示に設定

        const currentYearMonthDisplay = document.getElementById("currentYearMonth");
        const prevYearMonthBtn = document.getElementById("prevYearMonth");
        const nextYearMonthBtn = document.getElementById("nextYearMonth");

        function updateYearMonthDisplay() {
            currentYearMonthDisplay.textContent = yearMonths[currentYearMonthIndex];
        }

        function goToPreviousYearMonth() {
            currentYearMonthIndex = (currentYearMonthIndex === 0) ? 11 : currentYearMonthIndex - 1;
            updateYearMonthDisplay();
        }

        function goToNextYearMonth() {
            currentYearMonthIndex = (currentYearMonthIndex === 11) ? 0 : currentYearMonthIndex + 1;
            updateYearMonthDisplay();
        }

        prevYearMonthBtn.addEventListener("click", goToPreviousYearMonth);
        nextYearMonthBtn.addEventListener("click", goToNextYearMonth);

        // 初期表示の年月を設定
        updateYearMonthDisplay();
    </script>
@endsection
