<div class="border-b-gray-300 border-b last:border-0 py-6 flex flex-col lg:grid lg:grid-cols-12 lg:gap-6 lg:odd:bg-slate-100 lg:p-6">
    <!-- Featured image -->
    <a href="{{ route('posts.show', $post) }}" class="lg:col-span-4">
        <div class="mb-6 lg:mb-0 h-60 bg-gray-400 rounded bg-post-placeholder bg-cover bg-center bg-no-repeat opacity-75 hover:opacity-100 transition-all duration-500"></div>
    </a>
    <div class="lg:col-span-8 flex flex-col">
        <!-- Title -->
        <h1 class="text-xl font-bold text-rose-500 underline break-all">
            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
        </h1>

        <!-- Meta -->
        <div class="flex justify-between mt-0 pb-3">
            <x-posts.post-meta :post="$post" />
            <x-posts.post-action :post="$post" />
        </div>
        
        <!-- Body -->
        <x-posts.post-body :post="$post" :is-excerpt="true"></x-posts.post-body>

        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mt-3">
            <!-- Categories -->
            <ul class="font-bold text-sm lg:mt-0 rounded flex flex-wrap order-1 lg:order-0">
                @foreach ($post->categories->take(20) as $category)
                    <li class="my-0.5 mr-1">
                        <a href="#" class="block text-rose-500 px-4 py-1 bg-slate-200 hover:bg-slate-300 transition-all duration-250">
                            <span class="font-bold rounded-xs">{{ $category->name }}</span>
                        </a>
                    </li>
                @endforeach

                @if (count($post->categories) > 20)
                    <div class="my-0.5 mr-1">
                        <a href="{{ route('posts.show', $post) }}" class="block text-rose-500 px-4 py-1 bg-slate-200 hover:bg-slate-300 transition-all duration-250">
                            <span class="font-bold rounded-xs">...</span>
                        </a>
                    </div>
                @endif
            </ul>

            <!-- Read More -->
            {{-- <a href="{{ route('posts.show', $post) }}" class="text-lg text-rose-500 underline font-bold self-end lg:self-start mb-6 el lg:ml-6 shrink-0 text-right order-0 lg:order-1">Read More</a> --}}
        </div>
    </div>
</div>