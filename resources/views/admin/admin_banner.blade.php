@extends('admin.admin_app')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="text-left mb-4">
            <a style="color: black; font-size: 24px; text-decoration: none;" href="{{ url('/admin_top') }}">←戻る</a>
            <h2 style="margin-top: 20px;">バナー管理</h2>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-lg-12">
            @foreach($banners as $banner)
            <div class="text-center mb-4 d-flex justify-content-center align-items-center">
                <img src="{{ asset('storage/banners/' . basename($banner->image)) }}" alt="バナー画像" class="img-fluid mr-3">
                <form method="POST" action="{{ route('banner.destroy', $banner->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm rounded-circle">−</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>

    <div class="col-md-6"> 
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->has('image'))
        <div class="alert alert-danger">
            ※画像ファイルを選択してください。
        </div>
        @endif

        <form id="bannerForm" method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data">
            @csrf
            <div id="imageInputContainer">
                <div class="image-preview-container" style="display: flex; align-items: center;">
                    <img class="image-preview" src="#" alt="画像プレビュー" style="max-width: 100%; max-height: 200px; margin: 20px 10px; display: none;">
                    <input type="file" class="form-control-file image-input" name="image[]" onchange="previewImage(event)" style="margin: 20px 10px; flex-grow: 1;">
                    <button onclick="removeImageInput(this)" class="btn btn-danger btn-sm rounded-circle remove-button" style="margin: 20px 10px;">−</button>
                </div>
            </div>
            <div class="col-lg-10">
                <button onclick="addNewImageInput(event)" class="btn btn-success btn-sm rounded-circle" style="margin-top: 20px;">＋</button>
            </div>
    
            <div class="row mt-5 mb-0">
                <div class="col-md-12 text-center">
                    <button id="submitButton" type="submit" class="btn btn-secondary btn-lg custom-btn-width" style="font-size: 1.5rem;">
                        {{ __('登録') }}
                    </button>
                </div>
            </div>
            
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = event.target.parentElement.querySelector('.image-preview');
            output.style.display = 'block';
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function addNewImageInput(event) {
        event.preventDefault();

        var container = document.getElementById('imageInputContainer');
        var newInputContainer = document.createElement('div');
        newInputContainer.className = 'image-preview-container';
        newInputContainer.style.display = 'flex';
        newInputContainer.style.alignItems = 'center';
        var newInput = document.createElement('input');
        newInput.type = 'file';
        newInput.className = 'form-control-file image-input';
        newInput.name = 'image[]';
        newInput.onchange = previewImage;
        newInput.style.margin = '20px 10px';
        newInput.style.flexGrow = '1';
        var newPreview = document.createElement('img');
        newPreview.className = 'image-preview';
        newPreview.src = '#';
        newPreview.alt = '画像プレビュー';
        newPreview.style.maxWidth = '100%';
        newPreview.style.maxHeight = '200px';
        newPreview.style.margin = '20px 10px';
        newPreview.style.display = 'none';
        var removeButton = document.createElement('button');
        removeButton.textContent = '−';
        removeButton.className = 'btn btn-danger btn-sm rounded-circle remove-button';
        removeButton.style.margin = '20px 10px';
        removeButton.onclick = function() {
            removeImageInput(this);
        };
        newInputContainer.appendChild(newPreview);
        newInputContainer.appendChild(newInput);
        newInputContainer.appendChild(removeButton);
        container.appendChild(newInputContainer);
    }

    function removeImageInput(button) {
        var container = button.parentElement;
        container.remove();
    }

    // フォーム送信前のイベントリスナーを追加
    document.getElementById('bannerForm').addEventListener('submit', function(event) {
        // 画像が選択されているかを確認
        var imageInput = document.querySelector('.image-input');
        if (imageInput.files.length === 0) {
            // 画像が選択されていない場合、フォームの送信を中止
            event.preventDefault();
            alert('画像を選択してください');
        }
    });
</script>

@include('admin.admin_header')
@endsection
