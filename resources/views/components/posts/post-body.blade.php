<div class="grow break-all text-lg">
    @if ($isExcerpt)
        {{ substr($post->body, 0, 240) }}
        @if (strlen($post->body > 240))
            <span>[...]<span>
        @endif
    @else
        <p class="mb-24">{!! nl2br(e($post->body)) !!}</p>
    @endif
</div>