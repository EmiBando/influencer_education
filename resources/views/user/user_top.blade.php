@extends('layouts.main_layout')

@section('content')
<div class="py-4">
  <!-- <img src="{{asset("storage/storage/img/sample1.jpg")}}"> -->
  <div class="swiper-container">
		<!-- 全スライドをまとめるラッパー -->
		<div class="swiper-wrapper">
			<!-- 各スライド -->
      @foreach($banners as $banner)
			<div class="swiper-slide"><img src="{{asset($banner->image)}}"></div>
			@endforeach
		</div><!-- ページネーション（※省略可） -->
		<div class="swiper-pagination"></div><!-- ナビゲーションボタン（※省略可） -->
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div><!-- スクロールバー（※省略可） -->
	</div>
</div>

<div class="news-wrapper">
  <h2>お知らせ</h2>
  <div class="news-lists">
    @foreach($articles as $article)
      <table>
        <tbody>
          <tr>
            <td>{{$article->posted_date}}</td>
            <td><a href="{{route('news')}}">{{$article->title}}</a></td>
          </tr>
        </tbody>
      </table>
    @endforeach
  </div>
</div>
@endsection

