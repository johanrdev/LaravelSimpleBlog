<a href="{{ route('posts.show', $post) }}">
    <div {{ $attributes(['class' => 'mb-6 lg:mb-0 bg-gray-400 rounded bg-post-placeholder bg-cover bg-center bg-no-repeat opacity-75 hover:opacity-100 transition-all duration-500 flex items-center justify-center text-5xl text-white text-shadow'])}}>
        {{ $slot }}
    </div>
</a>