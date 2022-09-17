<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-12">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
                            {{ __('Write post') }}
                        </h2>
                    </div>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="text-rose-500 font-bold">{{ $error }}</p>
                        @endforeach
                    @endif

                    <form method="POST" action="{{ route('posts.store') }}">
                        @method('POST')
                        @csrf

                        <div class="mt-3">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block w-full" type="text" name="title" required />
                        </div>
                        <div class="mt-3">
                            <x-input-label for="categories" :value="__('Category')" />
                            <select multiple="multiple" id="categories" name="categories[]" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach (Auth::user()->categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <x-input-label for="title" :value="__('Body')" />
                            <textarea id="body" name="body" rows="20" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 resize-none" required></textarea>
                        </div>
                        <div class="flex justify-end">
                            <x-primary-button class="rounded-sm bg-teal-500">Publish</x-primary-button>
                        </div>
                    </form>

                    {{-- <form method="POST" action="{{ route('search') }}">
                        @csrf

                        <div class="flex {{ $posts->hasPages() ? 'mb-0' : 'mb-6' }}">
                            <input class="grow mr-1 border-gray-400 rounded-sm" type="text" name="term" placeholder="Search by title, text, category or author name" />
                            <x-primary-button class="rounded-sm bg-teal-500">Search</x-primary-button>
                        </div>
                    </form> --}}

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
