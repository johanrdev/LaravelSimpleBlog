<x-app-layout>
    <x-site-container>
        <x-site-inner-container>
            <x-container>
                <x-inner-container>
                    <div class="mb-12 relative">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
                            {{ __('Editing: ') . '"' . $post->title . '"' }}
                        </h2>

                        <form method="POST" action="{{ route('posts.destroy', $post) }}">
                            @method('DELETE')
                            @csrf

                            <x-primary-button class="absolute right-0 top-0 rounded-sm bg-transparent text-rose-500 hover:text-white">Delete</x-primary-button>
                        </form>
                    </div>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="text-rose-500 font-bold">{{ $error }}</p>
                        @endforeach
                    @endif

                    <form method="POST" action="{{ route('posts.update', $post) }}">
                        @method('PUT')
                        @csrf

                        <div class="mt-3">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block w-full" type="text" name="title" value="{{ $post->title }}" required />
                        </div>
                        <div class="mt-3">
                            <x-input-label for="categories" :value="__('Categories')" />
                            <select multiple="multiple" id="categories" name="categories[]" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach (Auth::user()->categories as $category)
                                    <option value="{{ $category->id }}" @selected($post->categories->contains($category))>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <x-input-label for="title" :value="__('Body')" />
                            <textarea id="body" name="body" rows="20" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 resize-none" required>{{ $post->body }}</textarea>
                        </div>
                        <div class="mt-3 flex justify-end">
                            <x-primary-button class="rounded-sm bg-teal-500">Update</x-primary-button>
                        </div>
                    </form>

                    {{-- <form method="POST" action="{{ route('search') }}">
                        @csrf

                        <div class="flex {{ $posts->hasPages() ? 'mb-0' : 'mb-6' }}">
                            <input class="grow mr-1 border-gray-400 rounded-sm" type="text" name="term" placeholder="Search by title, text, category or author name" />
                            <x-primary-button class="rounded-sm bg-teal-500">Search</x-primary-button>
                        </div>
                    </form> --}}

                    
                </x-inner-container>
            </x-container>
        </x-site-inner-container>
    </x-site-container>
</x-app-layout>