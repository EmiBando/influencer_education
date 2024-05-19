@extends('user_app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="text-left">
                <a style="color: black; font-size: 24px; text-decoration: none;" href="{{ url('/user_top') }}">←戻る</a>
            </div>
            <div class="schedule-container text-center">
                <div class="year-month-display d-flex align-items-center justify-content-center" id="yearMonthDisplay">
                    <span id="prevYearMonth" style="font-size: 24px;">&lt;</span>
                    <span id="currentYearMonth" style="font-size: 24px; margin: 0 20px;">2024年7月</span>
                    <span id="nextYearMonth" style="font-size: 24px;">&gt;</span>
                    <a href="{{ route('showCurriculumByGrade', ['gradeId' => $currentGrade->id]) }}" class="btn btn-secondary ml-4 current-grade-btn">
                        {{ $currentGrade->name }}のカリキュラム
                    </a>
                </div>
                <div style="margin-bottom: 50px;"></div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center text-center">
        <div class="col-lg-2 text-center">
            <div class="col-sm-12">
                <div class="btn-group-vertical">
                    @foreach ($grades as $grade)
                        <a href="{{ route('showCurriculumByGrade', ['gradeId' => $grade->id]) }}" class="btn btn-primary {{ $grade->id == $currentGrade->id ? 'active' : '' }}" style="margin-bottom: 20px; background-color: #00FFFF; border-color: #7d7d7d; border-radius: 20px;">
                            {{ $grade->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-10">
            <div class="row justify-content-center" id="curriculumContainer">
                @foreach($curriculums as $curriculum)
                    <div class="col-sm-4 mb-5 mr-3">
                        <div class="border p-3 h-100">
                            <img src="画像のURL" alt="画像の説明" class="img-fluid">
                            <h2 class="mt-3 mb-2" style="font-size: 20px;">{{ $curriculum->title }}</h2>
                            @foreach($curriculum->deliveryTimes as $deliveryTime)
                                <p class="mb-0">{{ $deliveryTime->delivery_from }} ~ {{ $deliveryTime->delivery_to }}</p>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        const yearMonths = ["2024年1月", "2024年2月", "2024年3月", "2024年4月", "2024年5月", "2024年6月", "2024年7月", "2024年8月", "2024年9月", "2024年10月", "2024年11月", "2024年12月"];
        let currentYearMonthIndex = 6; // 7月からスタート

        const currentYearMonthDisplay = document.getElementById("currentYearMonth");
        const prevYearMonthBtn = document.getElementById("prevYearMonth");
        const nextYearMonthBtn = document.getElementById("nextYearMonth");

        function updateYearMonthDisplay() {
            currentYearMonthDisplay.textContent = yearMonths[currentYearMonthIndex];
        }

        function goToPreviousYearMonth() {
            currentYearMonthIndex = (currentYearMonthIndex === 0) ? 11 : currentYearMonthIndex - 1;
            updateYearMonthDisplay();
            updateSchedule();
        }

        function goToNextYearMonth() {
            currentYearMonthIndex = (currentYearMonthIndex === 11) ? 0 : currentYearMonthIndex + 1;
            updateYearMonthDisplay();
            updateSchedule();
        }

        function updateSchedule() {
            const yearMonth = yearMonths[currentYearMonthIndex];
            const gradeId = {{ $currentGrade->id }};

            fetch('{{ route("getSchedule") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ date: yearMonth, gradeId: gradeId })
            })
            .then(response => response.json())
            .then(data => {
                const curriculumContainer = document.getElementById("curriculumContainer");
                curriculumContainer.innerHTML = '';

                data.curriculums.forEach(curriculum => {
                    const curriculumDiv = document.createElement('div');
                    curriculumDiv.className = 'col-sm-4 mb-5 mr-3';
                    curriculumDiv.innerHTML = `
                        <div class="border p-3 h-100">
                            <img src="画像のURL" alt="画像の説明" class="img-fluid">
                            <h2 class="mt-3 mb-2" style="font-size: 20px;">${curriculum.title}</h2>
                            ${curriculum.deliveryTimes.map(time => `<p class="mb-0">${time.delivery_from} ~ ${time.delivery_to}</p>`).join('')}
                        </div>
                    `;
                    curriculumContainer.appendChild(curriculumDiv);
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        prevYearMonthBtn.addEventListener("click", goToPreviousYearMonth);
        nextYearMonthBtn.addEventListener("click", goToNextYearMonth);

        updateYearMonthDisplay();
    </script>

    <style>
        .current-grade-btn {
            margin-left: 20px;
        }
    </style>
@endsection
