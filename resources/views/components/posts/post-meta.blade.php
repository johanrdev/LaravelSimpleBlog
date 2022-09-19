<div class="flex justify-center">
    <div class="italic">
        <span>Published {{ $post->created_at->diffForHumans() }} by</span>
        <x-link href="{{ route('users.show', $post->user) }}">{{ $post->user->name }}</x-link>
    </div>
</div>