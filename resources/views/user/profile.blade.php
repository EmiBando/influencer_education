@extends('user.user_header')

@section('content')
<script src="{{ asset('js/formValidation.js') }}"></script>
<div hidden id="validationErrors">{{ json_encode($errors->all()) }}</div>
<div class="ContentsArea">
    <h1>プロフィール変更</h1>
    <div class="MainContents">
        @if ($errors->any())
            <div hidden id="validationErrors">{{ json_encode($errors->messages()) }}</div>
        @endif
        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" class="ProfileForm">
            @csrf
            @method('PUT')

            <div class="ProfileImageArea">
                <div class="ProfileImageWrapper">
                    <img class="ProfileImg" id="currentProfileImage" src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('storage/default.png') }}" alt="プロフィール画像">
                </div>
                <div class="ProfileFormGroup">
                <h2><label for="profileImage">プロフィール画像</label></h2>
                    <input class="ProfileFormGroupBtn" type="file" name="profileImage" id="profileImage">
                </div>
            </div>
            <table class="ProfileFormGroup">
            <tr>
            <td class="ProfileFormGroupLabel"><label for="name">ユーザーネーム</label></td>
            <td><input type="text" name="name" id="name" value="{{ auth()->user()->name }}"></td>
            </tr>

            <tr>
            <td class="ProfileFormGroupLabel"><label for="nameKana">カナ</label></td>
            <td><input type="text" name="nameKana" id="nameKana" value="{{ auth()->user()->name_kana }}"></td>
            </tr>

            <tr>
            <td class="ProfileFormGroupLabel"><label for="email">メールアドレス</label></td>
            <td><input type="email" name="email" id="email" value="{{ auth()->user()->email }}"></td>
            </tr>

            <tr>
            <td class="ProfileFormGroupLabel"><label>パスワード</label></td>
            <td><a href="{{ route('user.password.change') }}" class="ProfileFormGroupBtn">パスワードを変更する</a></td>
            </tr>
            </table>
            <button type="submit" class="BtnPrimary">登録</button>
        </form>
    </div>
</div>
@endsection