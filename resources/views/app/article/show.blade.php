@extends('layouts.app')
@section('content')
<div id="app">
    <article-component></article-component>
</div>
<hr>
<div class="row">
    <form action="">
        <div class="mb-3">
            <label for="commentSubject" class="form-label">Тема коментарію:</label>
            <input type="text" class="form-control" id="commentSubject">
        </div>
        <div class="mb-3">
            <label for="commentBody" class="form-label">Текст коментарію:</label>
            <textarea name="" id="commentBody" cols="30" rows="3" class="form-control"></textarea>
        </div>
        <button class="btn btn-success" type="submit">Відправити</button>
    </form>
    <div class="toast-container pb-5 mt-5 mx-auto">
        @foreach($article->comments as $comment)
            <div class="toast show" style="width:100%">
                <div class="toast-header">
                    <img src="https://via.placeholder.com/50/5F1138/FFFFFF/?text=User" alt="user_avatar" class="rounded">
                    <strong class="mx-auto">{{ $comment->subject }}</strong>
                    <small class="text-muted">{{ $comment->createdAtForHumans() }}</small>
                </div>
                <div class="toast-body">{{ $comment->body }}</div>
            </div>
        @endforeach
    </div>
</div>
@endsection
@section('vue')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
