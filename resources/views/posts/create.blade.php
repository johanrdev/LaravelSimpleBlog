<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.inner-container>
                    <x-page-header>
                        <x-page-title>
                                {{ __('Write Post') }}
                        </x-page-title>
                    </x-page-header>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <x-alert type="error">{{ $error }}</x-alert>
                        @endforeach
                    @endif
                    <x-forms.create-post />
                </x-containers.inner-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>
