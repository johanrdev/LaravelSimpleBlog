<div class="border-b-gray-200 border-b last:border-0 py-6 flex flex-col lg:grid lg:grid-cols-12 lg:gap-6">
    <!-- Featured image -->
    <a href="{{ route('posts.show', $post) }}" class="lg:col-span-4">
        <div class="mb-6 lg:mb-0 h-60 bg-gray-400 rounded bg-post-placeholder bg-cover bg-center bg-no-repeat opacity-75 hover:opacity-100 transition-all duration-500"></div>
    </a>
    <div class="lg:col-span-8 flex flex-col">
        <!-- Title -->
        <h1 class="text-xl font-bold">
            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
        </h1>

        <!-- Meta -->
        <ul class="font-bold text-xs mt-3 lg:mt-0 py-2 rounded flex flex-col md:flex-row flex-wrap">
            <li class="mr-4">
                Created: {{ $post->created_at->diffForHumans() }}
            </li>
            <li class="mr-4">
                Author: <a href="{{ route('getUserPosts', $post->user) }}" class="text-rose-500 underline">{{ $post->user->name }}</a>
            </li>
        </ul>
        
        <!-- Body -->
        <p class="grow block leading-relaxed">{{ $post->body }}</p>

        <div class="flex justify-between items-center flex-wrap mt-3">
            <!-- Categories -->
            <ul class="font-bold text-xs lg:mt-0 rounded flex flex-wrap">
                @foreach ($post->categories as $category)
                    <li>
                        <span class="bg-gray-200 text-gray-800 text-xs font-bold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                            <a href="#" class="text-rose-500 underline">{{ $category->name }}</a>
                        </span>
                    </li>
                @endforeach
            </ul>

            <!-- Read More -->
            <a href="{{ route('posts.show', $post) }}" class="text-rose-500 underline font-bold self-end">Read More</a>
        </div>
    </div>
</div>