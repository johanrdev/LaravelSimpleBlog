<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.inner-container>
                    <x-page-header>
                        <x-page-title>
                            {{ __('Editing: ') . '"' . $post->title . '"' }}
                        </x-page-title>

                        <x-forms.delete-post :post="$post" />
                    </x-page-header>

                    <x-validation-feedback />
                    
                   <x-forms.edit-post :post="$post" />
                </x-containers.inner-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>