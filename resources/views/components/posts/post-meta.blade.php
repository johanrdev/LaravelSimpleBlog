<div class="flex justify-center">
    <div class="italic">
        <span>Published {{ $post->created_at->diffForHumans() }} by</span>
        <x-links.link href="{{ route('users.show', $post->user) }}">{{ $post->user->name }}</x-links.link>
    </div>
</div>