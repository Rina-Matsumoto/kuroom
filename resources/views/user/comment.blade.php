@extends('layouts.comment')

@section('content')
<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">Comment</div>
            <div class="card-body chat-card">
                @foreach ($comments as $item)
                @include('components.comment', ['item' => $item])
                @endforeach
            </div>
        </div>
    </div>
</div>

<form method="POST" action="">
    @csrf
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
            <textarea class="form-control" id="comment" name="comment" aria-label="With textarea"></textarea>
            <button type="submit" id="submit" class="btn btn-outline-primary comment-btn">Submit</button>
        </div>
    </div>
</form>
@endsection

@section('js')
<script src="{{ asset('js/comment.js') }}"></script>
@endsection