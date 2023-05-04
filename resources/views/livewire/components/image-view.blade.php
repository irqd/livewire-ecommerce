@if (!$isProfile and $this->image)
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

@if ($loading)
loading="{{ $loading }}"
@endif
>
@else
<i class="fa-regular fa-user fs-5"></i>
@endif
