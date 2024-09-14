@php
    $isActive = false;

    $currentRouteName = Route::currentRouteName();

    if (isset($labelRoute) && str_contains($currentRouteName, $labelRoute)) {
        $isActive = true;
    }

@endphp

<a href="{{ $route }}" role="menuitem" class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium @if($isActive) text-white @endif text-bodydark2 duration-300 ease-in-out hover:text-white">
    {{ $btnLabel }}
</a>
