<div class="filament-admin-bar">
    {!! (new \Filament\Support\Assets\AssetManager)->renderStyles() !!}
    <link rel="stylesheet" href="{{ asset('css/codedor/filament-admin-bar/assets/filament-admin-bar.css') }}">

    <div
        class="fixed right-0 bottom-0 left-0"
        x-data="{
            open: window.localStorage.getItem('filament-admin-bar-open') === 'true' || false,
            toggle () {
                this.open = ! this.open
                window.localStorage.setItem('filament-admin-bar-open', this.open)
            }
        }"
    >
        <div class="flex justify-end mr-3 mb-3">
            <button
                type="button"
                x-on:click="toggle()"
                title="Toggle admin bar"
                class="
                    absolute bottom-full
                    inline-flex items-center justify-center p-3
                    font-medium text-sm text-white
                    rounded-full border shadow-lg shadow-teal-500/50 bg-teal-600 border-transparent
                    transition-colors
                    hover:bg-teal-500
                    outline-none focus:ring-offset-2 focus-ring-2 focus:ring-inset focus:ring-white focus-bg-teal-700 focus:ring-offset-teal-700
                "
            >
                <x-heroicon-o-cog class="w-6 h-6" />
                {{-- <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                </svg> --}}
            </button>
        </div>

        <div
            x-show="open"
            x-collapse.duration.500ms
            x-cloak
            class="rounded-t-lg border border-gray-300 bg-white"
        >
            <ul class="flex items-center rounded-t-lg  bg-gray-100 overflow-hidden">
                @foreach ($tabs as $tab)
                    <li
                        wire:click="changeTab('{{ $tab->key() }}')"
                        @class([
                            'py-3 px-4 text-sm font-medium text-gray-500 hover:text-gray-800 cursor-pointer',
                            'active bg-white rounded-t-lg text-teal-600 hover:text-teal-600' => $tab->key() === $current
                        ])
                    >
                        {{ $tab->name() }}
                    </li>
                @endforeach
            </ul>

            @foreach ($tabs as $tab)
                <div
                    {{-- Hide using style --}}
                    @style(['display: none' => ($tab->key() !== $current)])
                    wire:key="{{ $tab->key() }}"
                >
                    <div wire:ignore class="p-6" style="height: 400px; overflow-y: auto">
                        {{ $tab->render() }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
