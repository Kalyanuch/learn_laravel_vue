@extends('layouts.app')
@section('content')
<div id="app">
    <div class="row mt-5">
        <div class="col-12 p-3">
            <img src="{{ $article->img }}" class="border rounded mx-auto d-block" alt="{{ $article->slug }}">
            <h5 class="mt-5">{{ $article->title }}</h5>
            <p>
                @foreach($article->tags as $tag)
                    @if($loop->last)
                        <span class="tag">{{ $tag->label }}</span>
                    @else
                        <span class="tag">{{ $tag->label }} | </span>
                    @endif
                @endforeach
            </p>
            <p class="card-text">{{ $article->body }}</p>
            <p>Опубліковано: <i>{{ $article->createdAtForHumans() }}</i></p>
        </div>
    </div>
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

@endsection
