<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.inner-container>
                    <x-page-header>
                        <x-page-title>
                            {{ __('All categories') }}
                        </x-page-title>
                    </x-page-header>

                    @if ($categories->hasPages())
                        <x-containers.pagination-container>
                            {{ $categories->appends(request()->input())->links() }}
                        </x-containers.pagination-container>
                    @endif
                    
                    @foreach ($categories as $category)
                        <p><x-links.link href="{{ route('categories.edit', $category) }}">{{ $category->name }}</x-links.link></p>
                    @endforeach

                    @if ($categories->hasPages())
                        <x-containers.pagination-container>
                            {{ $categories->appends(request()->input())->links() }}
                        </x-containers.pagination-container>
                    @endif
                </x-containers.inner-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>
