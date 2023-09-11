<div class="media">
    <div class="media-body comment-body">
        <div class="row">
            <span class="comment-body-time">{{$item->created_at}}</span>
        </div>
        <span class="comment-body-content">{!! nl2br(e($item->comment)) !!}</span>
    </div>
</div>