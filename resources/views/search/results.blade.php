<x-app-layout>
    <x-site-container>
        <x-site-inner-container>
            <x-container>
                <x-inner-container>
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
                </x-inner-container>
            </x-container>
        </x-site-inner-container>
    </x-site-container>
</x-app-layout>
