<x-my-dropdown>

    {{-- Trigger --}}
    <x-slot name="trigger">
        <button class="flex w-full py-2 pl-3 text-sm font-semibold text-left pr-9d lg:inline-flex lg:w-32">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            {{-- DOWN ARROW --}}
            <x-my-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    {{-- Dropdown Links --}}
    {{-- item 1 --}}
    <x-my-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}"
                        :active="request()->routeIs('home')">All
    </x-my-dropdown-item>
    {{-- item 2 --}}
    @foreach ($categories as $category )
        {{-- merge search and category --}}
        <x-my-dropdown-item
            href="/?category={{ $category->slug}}&{{ http_build_query(request()->except('category', 'page')) }} }}"
            :active='request()->is("categories/.{$category->slug}")'
        >{{ucwords($category->name)}}
        </x-my-dropdown-item>
        
        {{-- http_build_query(request()->except('category') --}}

    @endforeach
</x-my-dropdown>
