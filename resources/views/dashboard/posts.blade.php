@extends('dashboard')

@section('content')
    <!-- Section heading -->
    <x-page-header>
        <x-page-title>
                {{ __('Dashboard - Posts') }}
        </x-page-title>
    </x-page-header>

    @if ($posts->hasPages())
        <x-containers.pagination-container>
            {{ $posts->appends(request()->input())->links() }}
        </x-containers.pagination-container>
    @endif

    <table class="overflow-x-auto w-full">
        <thead>
            <tr class="bg-slate-300">
                <th class="flex p-1">Post title</th>
            </tr>
        </thead>
        <tbody>
    @forelse ($posts as $post)
            <tr class="odd:bg-gray-100 border-b">
                <td class="p-1">
                    <x-links.link href="{{ route('posts.edit', $post) }}">{{ $post->title }}</x-links.link>
                </td>
            </tr>
    @empty
        <tr>
            <td>Nothing to show</td>
        </tr>
    @endforelse
        </tbody>
    </table>

    @if ($posts->hasPages())
        <x-containers.pagination-container>
            {{ $posts->appends(request()->input())->links() }}
        </x-containers.pagination-container>
    @endif

@endsection