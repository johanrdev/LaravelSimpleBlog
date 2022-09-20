<form method="POST" action="{{ route('search') }}">
    @csrf

    <div class="flex">
        <x-text-input id="term" class="block grow mr-1" type="text" name="term" placeholder="Search by title, text, category or author name" required />
        <x-primary-button class="rounded-sm bg-teal-500">Search</x-primary-button>
    </div>
</form>