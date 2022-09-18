@if (Auth::check()) 
    @if ($post->user->id === Auth::user()->id)
        <div class="ml-6">
            <x-link href="{{ route('posts.edit', $post) }}">Edit</x-link>
        </div>
    @endif
@endif