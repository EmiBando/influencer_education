@extends('user.user_app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="text-left">
                <a style="color: black; font-size: 24px; text-decoration: none;" href="{{ url('/user_top') }}">←戻る</a>
            </div>
            <div class="schedule-container text-center">
                <div class="year-month-display d-flex align-items-center justify-content-center" id="yearMonthDisplay">
                    <i class="fas fa-chevron-left fa-2x" onclick="changeMonth(-1)" style="cursor: pointer;"></i>
                    <span id="selectedDate" style="font-size: 24px; margin: 0 20px; font-size: 32px;">{{ \Carbon\Carbon::parse($selectedDate)->format('Y年n月') }}スケジュール</span>
                    <i class="fas fa-chevron-right fa-2x" onclick="changeMonth(1)" style="cursor: pointer;"></i>
                    <a href="{{ route('showCurriculumByGrade', ['gradeId' => $currentGrade->id]) }}" class="btn btn-secondary mx-4 current-grade-btn">
                        {{ $currentGrade->name }}
                    </a>
                </div>
                <div style="margin-bottom: 100px;"></div>
            </div>
        </div>
    </div>
    
    <style>
        /* 学年ごとのボタンの背景色 */
        .btn-grade-1_6 {
            background-color: #00FFFF;
            border-color: #7d7d7d;
            color: white;
        }
        
        .btn-grade-7_9 {
            background-color: #7fffd4;
            border-color: #7d7d7d;
            color: white;
        }
    
        .btn-grade-10_12 {
            background-color: #90ee90;
            border-color: #7d7d7d;
            color: white;
        }
    </style>
    
    <div class="row justify-content-center text-center">
        <div class="col-lg-2 text-center">
            <div class="col-sm-12">
                <div class="btn-group-vertical">
                    @foreach ($grades as $grade)
                        @php
                            $buttonClass = '';
                            if ($grade->id >= 1 && $grade->id <= 6) {
                                // grade1~6の場合は水色
                                $buttonClass = 'btn-grade-1_6';
                            } elseif ($grade->id >= 7 && $grade->id <= 9) {
                                // grade7~9の場合は赤色
                                $buttonClass = 'btn-grade-7_9';
                            } elseif ($grade->id >= 10 && $grade->id <= 12) {
                                // grade10~12の場合は黄色
                                $buttonClass = 'btn-grade-10_12';
                            }
                        @endphp
                        <a href="{{ route('showCurriculumByGrade', ['gradeId' => $grade->id]) }}" class="btn {{ $buttonClass }} {{ $grade->id == $currentGrade->id ? 'active' : '' }}" style="margin-bottom: 20px; border-radius: 20px;">
                            {{ $grade->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    
        <div class="col-lg-10">
            <div class="row justify-content-center" id="curriculumContainer">
                @foreach($curriculums as $curriculum)
                    @php
                        $showCurriculum = false;
                        $alwaysDeliveryFlg = $curriculum->always_delivery_flg;
    
                        // 配信時間の制限を確認
                        foreach($curriculum->deliveryTimes as $deliveryTime) {
                            $deliveryFrom = \Carbon\Carbon::parse($deliveryTime->delivery_from);
                            $deliveryTo = \Carbon\Carbon::parse($deliveryTime->delivery_to);
                            $currentDate = \Carbon\Carbon::parse($selectedDate);
    
                            if ($alwaysDeliveryFlg == 1 || ($currentDate->greaterThanOrEqualTo($deliveryFrom) && $currentDate->lessThanOrEqualTo($deliveryTo))) {
                                $showCurriculum = true;
                                break;
                            }
                        }
                    @endphp
    
                    @if ($showCurriculum)
                        <div class="col-sm-4 mb-5 mr-3">
                            <div class="border p-3 h-100">
                                <img src="{{ asset('storage/thumbnail/' . $curriculum->thumbnail) }}" alt="カリキュラムのサムネイル画像" class="img-fluid">
                                <h2 class="mt-3 mb-2" style="font-size: 20px;">{{ $curriculum->title }}</h2>
                                @foreach($curriculum->deliveryTimes as $deliveryTime)
                                    <p class="mb-0">{{ $deliveryTime->delivery_from }} ~ {{ $deliveryTime->delivery_to }}</p>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    
    <script>
        function changeMonth(offset) {
            var currentDate = new Date('{{ $selectedDate }}');
            currentDate.setMonth(currentDate.getMonth() + offset);
            var year = currentDate.getFullYear();
            var month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
            var newDate = year + '-' + month + '-01';
    
            var currentGradeId = '{{ $currentGrade->id }}';
    
            // ページを更新する
            var url = '{{ route("showCurriculumByDate", ["date" => "REPLACE_DATE", "gradeId" => "REPLACE_GRADE"]) }}'
                .replace('REPLACE_DATE', newDate)
                .replace('REPLACE_GRADE', currentGradeId);
            window.location.href = url;
        }
    </script>
@endsection
