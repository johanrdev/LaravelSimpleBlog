<form method="POST" action="{{ route('categories.store') }}">
    @method('POST')
    @csrf

    <x-inputs.input-container>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block w-full" type="text" name="name" required />
    </x-inputs.input-container>
    <x-inputs.button-container>
        <x-primary-button class="rounded-sm bg-teal-500">Publish</x-primary-button>
    </x-inputs.button-container>
</form>