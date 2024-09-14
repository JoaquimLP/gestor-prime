<div class="mb-2 mt-4 px-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <h2 class="text-title-md2 font-bold text-black dark:text-white">
        {{ $title ?? 'Não Informado' }}
    </h2>

    @if (isset($route))
        <a href="{{ $route }}" class="inline-flex items-center justify-center rounded-full bg-primary px-6 py-3 text-center font-medium text-white hover:bg-opacity-90 lg:px-4 xl:px-5">
            {{ $btnLabel }}
        </a>
    @endif

    {{-- <nav>
        <ol class="flex items-center gap-2">
            @if (isset($first))
                <li>
                    <a class="font-medium @if (!isset($second)) text-primary @endif" href="{{ $routeFirst ?? "#" }}">{{ $first }} @if (isset($second))/@endif</a>
                </li>
            @endif

            @if (isset($second))
                <li>
                    <a class="font-medium @if (!isset($third)) text-primary @endif" href="{{ $routeSecond ?? "#" }}">{{ $second }} @if (isset($third))/@endif</a>
                </li>
            @endif

            @if (isset($third))
                <li>
                    <a class="font-medium @if (!isset($fourth)) text-primary @endif" href="{{ $routeThird ?? "#" }}">{{ $third }} @if (isset($fourth))/@endif</a>
                </li>
            @endif

            @if (isset($fourth))
                <li>
                    <a class="font-medium text-primary" href="#">{{ $fourth }}</a>
                </li>
            @endif
        </ol>
    </nav> --}}
</div>
