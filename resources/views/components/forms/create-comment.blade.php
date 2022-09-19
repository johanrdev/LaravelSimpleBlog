<form method="POST" action="{{ route('comments.storeWithPost', $post) }}" id="comment-form">
    @method('POST')
    @csrf

    <x-inputs.input-container>
        <textarea id="text" name="text" rows="7" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 resize-none" required></textarea>
    </x-inputs.input-container>
    <x-inputs.button-container>
        <x-primary-button class="rounded-sm bg-teal-500">Publish</x-primary-button>
    </x-inputs.button-container>
</form>