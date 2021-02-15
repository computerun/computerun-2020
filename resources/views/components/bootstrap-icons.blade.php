<svg 
@if (isset($optical))
    class="bi optical-{{$optical}}"
@else
    class="bi"
@endif
width="{{$size ?? 32}}" height="{{$size ?? 32}}" fill="currentColor" aria-hidden="{{$aria_hidden ?? 'true'}}">
    <use xlink:href="/img/bootstrap-icons.svg#{{$icon}}"/>
</svg>
