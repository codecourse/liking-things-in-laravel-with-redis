<div>
    <div>Hey {{ auth()->user()->name }}</div>

    @foreach($comments as $comment)
        <div>
            <p>{{ $comment->body }}</p>
            <form action="{{ $comment->likedBy(auth()->user()) ? route('comments.likes.destroy', $comment) : route('comments.likes.store', $comment) }}" method="post">
                @csrf
                @if($comment->likedBy(auth()->user()))
                    @method('DELETE')
                @endif

                <button>Like ({{ $comment->getLikeCount() }})</button>
                @if($comment->likedBy(auth()->user()))
                    (You liked this)
                @endif
            </form>
        </div>
    @endforeach
</div>
