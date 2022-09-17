<div class="flex flex-col items-center pt-6 mt-24 sm:pt-0 grow">
    <div class="text-xl font-bold text-slate-400 uppercase">
        {{ $title }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
