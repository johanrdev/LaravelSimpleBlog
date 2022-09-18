@foreach ($comments as $comment)
    @if (Auth::check())
    <div class="odd:bg-slate-100 border-gray-300 border {{ !is_null($comment->parent_id) ? 'ml-12' : '' }} p-3 my-3 rounded {{ Auth::user()->id === $comment->user->id ? 'border-l-4 border-l-teal-500' : '' }}">
    @else
    <div class="odd:bg-slate-100 border-gray-300 border {{ !is_null($comment->parent_id) ? 'ml-12' : '' }} p-3 my-3 rounded">
    @endif
        <div class="flex">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOSIZ6hZseAPKb42yOVWSqt00bWSi8yusbMQ&usqp=CAU" alt="" class="w-10 h-10 rounded mr-3 shrink-0 border">
            <div class="flex flex-col grow">
                <h3 class="font-bold text-lg">
                    <a href="{{ route('getUserBlog', $comment->user) }}" class="text-rose-500 font-bold underline">{{ $comment->user->name }}</a> published:
                </h3>
                <ul class="mb-3 flex italic">
                    <li>{{ $comment->created_at->diffForHumans() }}</li>
                    <li class="before:mx-2 before:content-['/']">
                        <a onclick="event.preventDefault(); document.getElementById('create-reply-form').submit();" class="text-rose-500 font-bold underline cursor-pointer">Reply</a>

                        <form method="POST" action="{{ route('reply', $comment) }}" id="create-reply-form">
                            @csrf
                        </form>
                    </li>
                    @if (Auth::check())
                        @if (Auth::user()->id === $comment->user->id || $post->user->id === Auth::user()->id)
                            <li class="before:mx-2 before:content-['/']">
                                <a href="{{ route('comments.edit', $comment) }}" class="text-rose-500 font-bold underline">Edit</a></li>
                            <li class="before:mx-2 before:content-['/']">
                                <a href="#"" onclick="event.preventDefault(); document.getElementById('delete-comment-form').submit();" class="text-rose-500 font-bold underline">Delete</a></li>

                            <form method="POST" action="{{ route('comments.destroy', $comment) }}" id="delete-comment-form">
                                @method('DELETE')
                                @csrf
                            </form>
                        @endif
                    @endif
                </ul>
                <p class="text-lg leading-relaxed">{{ $comment->text }}</p>
            </div>
        </div>
    </div>

    @include('posts.partials.comment', ['comments' => $comment->replies])
@endforeach

