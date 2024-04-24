<div>
    <div>Hey {{ auth()->user()->name }}</div>

    @foreach($comments as $comment)
        <div>
            <p>{{ $comment->body }}</p>
            <form action="">
                <button>Like</button>
            </form>
        </div>
    @endforeach
</div>
