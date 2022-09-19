@if (Auth::check()) 
    @if ($post->user->id === Auth::user()->id)
        <div class="ml-6">
            <x-links.link href="{{ route('posts.edit', $post) }}">Edit</x-links.link>
        </div>
    @endif
@endif