@extends('user.user_header')

@section('content')
<div class="ContentsArea">
    <a href="javascript:history.back()" class="TempBackButton">←戻る</a><!-- 佐藤：仮設定戻るボタン -->
    <div>
        <p>{{ $article->formatted_posted_date }}</p>
        <h2 class="UserArticleTitle">{{ $article->title }}</h2>
        <div>{{ $article->article_contents }}</div>
    </div>
</div>
@endsection