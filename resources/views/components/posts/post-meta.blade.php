<div class="flex justify-center">
    <div class="italic">
        <span>Published {{ $post->created_at->diffForHumans() }} by</span>
        <x-links.link href="{{ route('users.show', $post->user) }}">{{ $post->user->name }}</x-links.link>
        <span class="before:mx-2 before:content-['-']">
            <x-links.link href="{{ route('posts.show', $post) }}#comment-form">
                {{ count($post->comments) }} comments
            </x-links.link>
        </span>
    </div>
</div>