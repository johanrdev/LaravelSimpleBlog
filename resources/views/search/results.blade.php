<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Search results for: ') . '"' . $term . '"' . ' (' . count($results) . ' posts)' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ url()->previous() }}">Go back</a>
                    @foreach ($results as $post)
                        <x-posts.post-card :title="$post->title" :body="$post->body" :categories="$post->categories" :user="$post->user" :date="$post->created_at" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
