<form method="POST" action="{{ route('posts.destroy', $post) }}">
    @method('DELETE')
    @csrf

    <x-primary-button class="absolute right-0 top-0 rounded-sm bg-transparent text-rose-500 hover:text-white">Delete</x-primary-button>
</form>