<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.inner-container>
                    <x-page-header>
                        <x-page-title>
                                {{ __('Create new post') }}
                        </x-page-title>
                    </x-page-header>

                    <x-validation-feedback />
                    
                    <x-forms.create-post />
                </x-containers.inner-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>
