@if ($isLink) 
    <h1 {{ $attributes->merge(['class' => 'text-xl break-all'])}}>
        <x-links.link href="{{ route('posts.show', $post) }}">{{ $post->title }}</x-links.link>
    </h1>
@else
    <h1 {{ $attributes->merge(['class' => 'text-2xl md:text-3xl lg:text-3xl font-bold break-all mb-3'])}}>{{ $post->title }}</h1>
@endif