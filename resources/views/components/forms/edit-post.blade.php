<form method="POST" action="{{ route('posts.update', $post) }}">
    @method('PUT')
    @csrf

    <x-inputs.input-container>
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" class="block w-full" type="text" name="title" value="{{ $post->title }}" required />
    </x-inputs.input-container>
    <x-inputs.input-container>
        <x-input-label for="categories" :value="__('Categories')" />
        <select multiple="multiple" id="categories" name="categories[]" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @foreach (Auth::user()->categories as $category)
                <option value="{{ $category->id }}" @selected($post->categories->contains($category))>{{ $category->name }}</option>
            @endforeach
        </select>
    </x-inputs.input-container>
    <x-inputs.input-container>
        <x-input-label for="title" :value="__('Body')" />
        <textarea id="body" name="body" rows="20" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 resize-none" required>{{ $post->body }}</textarea>
    </x-inputs.input-container>
    <x-inputs.button-container>
        <x-primary-button class="rounded-sm bg-teal-500">Update</x-primary-button>
    </x-inputs.button-container>
</form>