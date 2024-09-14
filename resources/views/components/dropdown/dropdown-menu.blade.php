<button id="{{ $itemId }}-dropdown-button" data-dropdown-toggle="{{ $itemId }}-dropdown"
    class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
    type="button">
    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
    </svg>
</button>
<div id="{{ $itemId }}-dropdown" class="hidden z-10 w-auto bg-blue-600 text-white text-start rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ $itemId }}-dropdown-button">
        @foreach ($routes as $route)
            <li>
                <a href="{{ isset($route["url"]) ? $route["url"] : "#" }}" class="block p-1 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    {{ $route["name"] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
