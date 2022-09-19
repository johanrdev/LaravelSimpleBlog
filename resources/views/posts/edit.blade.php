<x-app-layout>
    <x-site-container>
        <x-site-inner-container>
            <x-container>
                <x-inner-container>
                    <x-page-header>
                        <x-page-title>
                            {{ __('Editing: ') . '"' . $post->title . '"' }}
                        </x-page-title>

                        <form method="POST" action="{{ route('posts.destroy', $post) }}">
                            @method('DELETE')
                            @csrf

                            <x-primary-button class="absolute right-0 top-0 rounded-sm bg-transparent text-rose-500 hover:text-white">Delete</x-primary-button>
                        </form>
                    </x-page-header>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <x-alert type="error">{{ $error }}</x-alert>
                        @endforeach
                    @endif

                   <x-forms.edit-post :post="$post" />
                </x-inner-container>
            </x-container>
        </x-site-inner-container>
    </x-site-container>
</x-app-layout>