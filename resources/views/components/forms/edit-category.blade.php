<form method="POST" action="{{ route('categories.update', $category) }}">
    @method('PUT')
    @csrf

    <x-inputs.input-container>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block w-full" type="text" name="name" value="{{ $category->name }}" required />
    </x-inputs.input-container>
    <x-inputs.button-container>
        <x-primary-button class="rounded-sm bg-teal-500">Update</x-primary-button>
    </x-inputs.button-container>
</form>