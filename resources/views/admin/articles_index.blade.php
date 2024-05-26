@extends('admin.adomi_header')

@section('content')
<div class="ContentsArea">
    <a href="javascript:history.back()" class="TempBackButton">←戻る</a><!-- 佐藤：仮設定戻るボタン -->
    <h1>お知らせ一覧</h1>

    <a class="LinkBtn" href="{{ route('admin.articles.create') }}">新規登録</a>
    <div class="MainContents">
        <table>
            <thead>
                <tr>
                    <th>投稿日時</th>
                    <th>タイトル</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td class="ArticlesIndex">{{ $article->posted_date->format('Y年n月j日') }}</td>
                        <td class="ArticlesIndex">{{ $article->title }}</td>
                        <td><a class="LinkBtn" href="{{ route('admin.articles.edit', $article->id) }}">変更する</a></td>
                        <td>
                            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="DeleteBtn" type="submit" onclick="return confirm('このお知らせを削除してもよろしいですか？');">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection