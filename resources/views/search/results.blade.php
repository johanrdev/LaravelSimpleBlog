<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.inner-container>
                    <x-page-header>
                        <x-page-title>
                            {{ count($results) . __(' result(s) for: ') . '"' . $term . '"' }}
                        </x-page-title>

                        <x-return-link :href="route('posts.index')" />
                    </x-page-header>

                    @forelse ($results as $post)
                        <x-posts.post-card :post="$post" />
                    @empty
                        <p>Nothing to show</p>
                    @endforelse
                </x-containers.inner-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>
