<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.inner-container>
                    <x-page-header>
                        <x-page-title>
                                {{ __('Editing: ') . '"' . $category->name . '"' }}
                        </x-page-title>

                        <x-forms.delete-category :category="$category" />
                    </x-page-header>

                    <x-validation-feedback />
                    
                    <x-forms.edit-category :category="$category" />
                </x-containers.inner-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>
