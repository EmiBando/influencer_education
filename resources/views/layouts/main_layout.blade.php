<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="../css/main_style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/management.js') }}" defer></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
</head>
<body>
  <header>
    <nav id="main_head">
      <div class="row justfy-content-between">
        <div class="col-8 my-3 ms-4">
          <button class="nav-btn">時間割</button>
          <button class="nav-btn">授業進捗</button>
          <button class="nav-btn">プロフィール設定</button>
        </div>
        <div class="col-1 "></div>
        <div class="col-2 m-3 text-end"><button class="logout-btn">ログアウト</button></div>
      </div>
      
    </nav>            
  </header>
        <div>
            @yield('content')
        </div>
        <!-- <script src="{{ asset('js/management.js')}}" defer></script> -->
      
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="{{'../../resources/js/slide.js'}}"></script>
        
</body>     
</html>
