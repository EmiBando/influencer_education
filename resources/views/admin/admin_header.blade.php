<div class="row justify-content-center">
    <div class="col-lg-6" style="margin-top: 100px; border: 1px solid #000; padding: 10px;">
        @if (Auth::guard('admin')->check())
            <p>ユーザーネーム : {{ Auth::guard('admin')->user()->name }}</p>
            <p>メールアドレス : {{ Auth::guard('admin')->user()->email }}</p>
        @endif
    </div>
</div>