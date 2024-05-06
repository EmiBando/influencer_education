@extends('user.user_header')

@section('content')
<script src="{{ asset('js/formValidation.js') }}"></script>
<div class="ContentsArea">
    <h1>パスワード変更</h1>
    <form action="{{ route('user.password.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div hidden id="validationErrors">{{ json_encode($errors->all()) }}</div>

        <table class="PasswordChangeForme">
        <tr>
            <td class="PasswordChangeFormeLabel"><label for="currentPassword">現在のパスワード</label></td>
            <td><input type="password" name="currentPassword" id="currentPassword"></td>
        </tr>
        <tr>
            <td><label for="newPassword">新しいパスワード</label></td>
            <td><input type="password" name="newPassword" id="newPassword"></td>
        </tr>
        <tr>
            <td><label for="newPasswordConfirmation">新しいパスワード（確認）</label></td>
            <td><input type="password" name="newPasswordConfirmation" id="newPasswordConfirmation"></td>
        </tr>
        </table>
        <button type="submit" class="PasswordChangeFormeBtn">更新</button>
    </form>
</div>
@endsection
