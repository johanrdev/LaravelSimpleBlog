@extends('dashboard')

@section('content')
    <!-- Section heading -->
    <x-page-header>
        <x-page-title>
                {{ __('Dashboard - Categories') }}
        </x-page-title>
    </x-page-header>

    @if ($categories->hasPages())
        <x-containers.pagination-container>
            {{ $categories->appends(request()->input())->links() }}
        </x-containers.pagination-container>
    @endif

    <table class="overflow-x-auto w-full">
        <thead>
            <tr class="bg-slate-300">
                <th class="flex p-1">Post title</th>
            </tr>
        </thead>
        <tbody>
    @forelse ($categories as $category)
            <tr class="odd:bg-gray-100 border-b">
                <td class="p-1">
                    <x-links.link href="{{ route('categories.edit', $category) }}">{{ $category->name }}</x-links.link>
                </td>
            </tr>
    @empty
        <tr>
            <td>Nothing to show</td>
        </tr>
    @endforelse
        </tbody>
    </table>

    @if ($categories->hasPages())
        <x-containers.pagination-container>
            {{ $categories->appends(request()->input())->links() }}
        </x-containers.pagination-container>
    @endif

@endsection