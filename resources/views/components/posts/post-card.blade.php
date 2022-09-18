<x-posts.post-card-container>
    <!-- Featured image -->
    <x-posts.post-image :post="$post" class="h-60" />

    <!-- Content -->
    <x-posts.post-content class="lg:col-span-2">
        <!-- Title -->
        <x-posts.post-title :post="$post" :isLink="true" />

        <!-- Meta -->
        <x-posts.post-meta-header class="justify-start">
            <x-posts.post-meta :post="$post" />
            <x-posts.post-action :post="$post" />
        </x-posts.post-meta-header>
        
        <!-- Body -->
        <x-posts.post-body :post="$post" :is-excerpt="true"></x-posts.post-body>

        <!-- Categories -->
        <x-posts.post-categories :post="$post" />
    </x-posts.post-content>
</x-posts.post-card-container>