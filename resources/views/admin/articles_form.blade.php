@extends('admin.adomi_header')

@section('content')

    <div class="ContentsArea">
        <script src="{{ asset('js/formValidation.js') }}"></script>
        <div hidden id="validationErrors">{{ json_encode($errors->all()) }}</div>

        <div class="ContentsArea">

            <h1>{{ $article->exists ? 'お知らせ変更' : 'お知らせ新規登録' }}</h1>
            <div class="MainContents">
                <form action="{{ $article->exists ? route('admin.articles.update', $article->id) : route('admin.articles.store') }}" method="POST">
                    @csrf
                    @if($article->exists)
                        @method('PUT')
                    @endif

                    <table class="ArticlesFormTable">
                        <tbody>
                            <tr>
                                <td class="ArticlesFormLabel">
                                    <label for="postedDate">投稿日時</label>
                                </td>
                                <td class="ArticlesFormInput">
                                    <input type="date" name="postedDate" id="postedDate" value="{{ old('posted_date', optional($article->posted_date)->format('Y-m-d')) }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="ArticlesFormLabel">
                                    <label for="title">タイトル</label>
                                </td>
                                <td class="ArticlesFormInput">
                                    <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="ArticlesFormLabel">
                                    <label for="articleContents">本文</label>
                                </td>
                                <td class="ArticlesFormInput">
                                    <textarea name="articleContents" id="articleContents">{{ old('article_contents', $article->article_contents) }}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="FormSubmitBtn">{{ $article->exists ? '更新' : '登録' }}</button>
                </form>
            </div>
        </div>

    </div>
@endsection
