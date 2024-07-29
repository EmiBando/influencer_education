@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-2">
            <div class="mt-3">
                <a style="color: #666; font-size: 15px; text-decoration: none;" href="{{ url('/admin/register') }}">新規会員登録はこちら</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="text-center mt-5"> 
                <h1 class="mb-4" style="font-size: 3.0rem; color: #666;">{{ __('管理画面ログイン') }}</h1>
            </div>

            <form method="POST" action="{{ url('admin/login') }}">
                @csrf

                <div class="row mt-5 mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end" style="color: #666;">{{ __('メールアドレス') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end" style="color: #666;">{{ __('パスワード') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-5 mb-0">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-secondary btn-lg custom-btn-width" style="font-size: 1.5rem;">
                            {{ __('ログイン') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
