<x-app-layout>
    <x-site-container>
        <x-site-inner-container>
            <x-container>
                <x-inner-container>
                    <x-page-header>
                        <x-page-title>
                            {{ __('Editing: ') . '"' . $post->title . '"' }}
                        </x-page-title>

                        <x-forms.delete-post :post="$post" />
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