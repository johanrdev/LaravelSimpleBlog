<div class="border-b-gray-200 border-b last:border-0 py-6 flex flex-col lg:grid lg:grid-cols-12 lg:gap-6">
    <div class="lg:col-span-4 mb-6 lg:mb-0 h-60 bg-gray-400 rounded bg-post-placeholder bg-cover bg-center bg-no-repeat opacity-75 hover:opacity-100 transition-all duration-500"></div>
    <div class="lg:col-span-8">
        <h1 class="text-xl font-bold">{{ $title }}</h1>
        <ul class="font-bold mb-3 italic flex flex-col md:flex-row flex-wrap">
            <li class="after:mx-2 md:after:content-['/']">Created {{ $date->diffForHumans() }}</li>
            <li class="after:mx-2 md:after:content-['/']">by <a href="{{ route('getUserPosts', $user) }}" class="text-rose-500 underline">{{ $user->name }}</a></li>
            <li>Filed in: 
                @foreach ($categories as $category)
                    {{ $category->name }}{{ $loop->index < $loop->count - 1 ? ', ' : '' }}
                @endforeach
            </li>
        </ul>
        <p>{{ $body }}</p>
    </div>
</div>