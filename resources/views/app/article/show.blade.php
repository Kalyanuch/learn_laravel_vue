@extends('layouts.app')
@section('content')
<div id="app">
    <article-component></article-component>
</div>
<hr>
<comments-component></comments-component>
@endsection
@section('vue')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
