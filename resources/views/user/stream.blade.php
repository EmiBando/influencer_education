
@extends('layouts.main_layout')

@section('content')
<div class ="content">
<button type="button" onclick="history.back()" class="return-btn">←戻る</button>

<div class="row"> 
  <div class="col"><video class="movie" width="400" src="{{asset($curriculum->video_url)}}"></video></div>
  <div class="col align-self-center text-center" id="lavel-result"><button class="label-btn" id="attendance">受講しました</button></div>
  <!-- <button class="label-btn" onclick="location.href='{{route('lavel_chenge')}}'">受講しました</button> -->
</div>
<button class="test-btn">test</button>

<div class="grade">
  <p class="grade-icon">{{$curriculum->grade->name}}</p> 
</div>
<h3>{{$curriculum->title}}</h3> 
<h5>講座内容</h5>
<p>{{$curriculum->description}}</p> 

</div>
@endsection