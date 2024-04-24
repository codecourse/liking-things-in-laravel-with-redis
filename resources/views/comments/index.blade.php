<div>
    <div>Hey {{ auth()->user()->name }}</div>

    @foreach($comments as $comment)
        <div>
            <p>{{ $comment->body }}</p>
            <form action="{{ route('comments.likes.store', $comment) }}" method="post">
                @csrf
                <button>Like ({{ $comment->getLikeCount() }})</button>
                @if($comment->likedBy(auth()->user()))
                    (You liked this)
                @endif
            </form>
        </div>
    @endforeach
</div>
