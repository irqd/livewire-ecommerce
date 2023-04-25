<img src="{{ $src }}" @if ($alt) alt="{{ $alt }}" @endif
    @class([$className => $className]) @if ($style)
@style([$style => $style])
@endif

@if ($width)
    width="{{ $width }}"
@endif

@if ($height)
    height="{{ $height }}"
@endif

loading="lazy"
>
