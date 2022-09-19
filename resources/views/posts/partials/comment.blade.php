@foreach ($comments as $comment)
    <x-comments.comment-container :comment="$comment">
        <x-comments.comment-inner-container>
            {{-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOSIZ6hZseAPKb42yOVWSqt00bWSi8yusbMQ&usqp=CAU" alt="" class="w-10 h-10 rounded mr-3 shrink-0 border"> --}}
            
            <x-comments.comment-content>
                <x-comments.comment-meta-header>
                    <x-comments.comment-meta>
                        <x-users.user-avatar :user="$comment->user" class="mr-3" />
                        <x-comments.comment-author>
                            <x-link href="{{ route('users.show', $comment->user) }}" class="mr-1">{{ $comment->user->name }}</x-link>
                            <x-comments.comment-timestamp>{{ $comment->created_at->diffForHumans() }}</x-comments.comment-timestamp>
                        </x-comments.comment-author>
                    </x-comments.comment-meta>
    
                    <x-comments.comment-actions>
                        <x-comments.comment-action>
                            <!-- Reply -->
                            @if (is_null($comment->parent_id))
                                <x-link onclick="event.preventDefault(); document.getElementById('create-reply-form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                                    </svg>
                                </x-link>
                            @endif
    
                            {{-- <form method="POST" action="{{ route('reply', $comment) }}" id="create-reply-form">
                                @csrf
                            </form> --}}
                        </x-comments.comment-action>
                        @if (Auth::check())
                            @if (Auth::user()->id === $comment->user->id || $post->user->id === Auth::user()->id)
                                <x-comments.comment-action>
                                    <!-- Edit -->
                                    <x-link href="{{ route('comments.edit', $comment) }}">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </x-link>
                                </x-comments.comment-action>
                                <x-comments.comment-action>
                                    <x-link href="#" onclick="event.preventDefault(); document.getElementById('delete-comment-form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                        </svg>
                                    </x-link>

                                    <form method="POST" action="{{ route('comments.destroy', $comment) }}" id="delete-comment-form">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </x-comments.comment-action>
                            @endif
                        @endif
                    </x-comments.comment-actions>
                </x-comments.comment-meta-header>
                <x-comments.comment-text>{!! nl2br(e($comment->text)) !!}</x-comments.comment-text>
            </x-comments.comment-content>
        </x-comments.comment-inner-container>
    </x-comments.comment-container>

    @include('posts.partials.comment', ['comments' => $comment->replies])
@endforeach
