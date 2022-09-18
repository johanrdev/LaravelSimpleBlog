<ul class="my-6 flex flex-wrap">
    @foreach ($post->categories as $category)
        <li class="my-0.5 mr-1">
            <x-posts.post-category>{{ $category->name }}</x-posts.post-category>
        </li>
    @endforeach
</ul>