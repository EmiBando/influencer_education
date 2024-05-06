@extends('user.user_header')

@section('content')
<div class="ContentsArea">
    <div>
        <p>{{ $article->formatted_posted_date }}</p>
        <h2 class="UserArticleTitle">{{ $article->title }}</h2>
        <div>{{ $article->article_contents }}</div>
    </div>
</div>
@endsection