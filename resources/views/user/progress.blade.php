@extends('user.user_header')

<script src="http://localhost/influencer_education/public/js/curriculumHandler.js"></script>
@section('content')
<div class="ContentsArea">

    <table>
        <tr>
            <td>
                <img class="profileImg" src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('storage/profile_images/default.png') }}" alt="プロフィール画像">
            </td>
            <td>
                <h2>{{ $user->name }}の授業進捗</h2>
                <h2 data-grade-id="{{ $user->grade->id }}">現在の学年: <span class="GradeStyle">{{ $user->grade->name }}</span></h2>
            </td>
        </tr>
    </table>

    <div class="ProgressArea">
        @foreach ($grades as $grade)
        <div class="GradeProgress" data-grade-id="{{ $grade->id }}">
            <table>
                <tr><span class="GradeStyle">{{ $grade->name }}</span></tr>
                @foreach ($grade->curriculums as $curriculum)
                <tr>
                    <td class="FlagArea"><span>{{ optional($curriculum->progress)->clear_flg ? '受講済' : '' }}</span></td>
                    <td>
                        <a href="{{ route('user.stream', $curriculum->id) }}"
                        onclick="return checkDeliveryTime(event, {{ json_encode($curriculum->deliveryTimes->first() ?? null) }}, {{ $curriculum->alway_delivery_flg }});">
                            {{ $curriculum->title }}
                        </a>
                    </td>
                </tr>
                @endforeach

            </table>
        </div>
        @endforeach
    </div>
</div>
@endsection