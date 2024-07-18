<div class="filament-admin-bar">
    <link rel="stylesheet" href="{{ asset('vendor/filament-admin-bar/assets/filament-admin-bar.css') }}">

    <div
        class="fixed right-0 bottom-0 left-0"
        x-data="{
            open: window.localStorage.getItem('filament-admin-bar-open') === 'true' || false,
            listenForResize: false,
            setListenForResize(shouldListen = true) {
                this.listenForResize = shouldListen
                {{-- The "user-select-none" class has to be bootstrap because the tailwind --}}
                {{-- classes are scoped to the filament-admin-bar component --}}
                window.document.documentElement.classList.toggle('user-select-none', shouldListen)
            },
            adminBarHeight: 400,
            toggle () {
                this.open = ! this.open
                window.localStorage.setItem('filament-admin-bar-open', this.open)
            },
            drag(event) {
                if (! this.listenForResize) return

                event.preventDefault()

                const $tabs = document.querySelector('[data-admin-bar-tabs]')
                const newHeight = window.innerHeight - $tabs.clientHeight - (event.clientY || event.touches[0]?.clientY)

                if (newHeight > 40 && newHeight < window.innerHeight - $tabs.clientHeight - 92) {
                    this.adminBarHeight = newHeight + 'px'
                }
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
                    inline-flex items-center justify-center p-1.5
                    font-medium text-sm text-white
                    rounded-full border-0 shadow-lg shadow-teal-500/50 bg-teal-600
                    transition-colors
                    hover:bg-teal-500
                    outline-none focus:ring-offset-2 focus-ring-2 focus:ring-inset focus:ring-white focus-bg-teal-700 focus:ring-offset-teal-700
                "
            >
                <x-heroicon-o-adjustments-horizontal class="w-8 h-8" />
            </button>
        </div>

        <div
            x-show="open"
            x-collapse.duration.500ms
            x-cloak
            class="shadow-2xl bg-white"
            data-admin-bar
        >
            <div
                data-admin-bar-resizer
                class="h-1 bg-teal-500 cursor-ns-resize touch-none"
                @mousedown="listenForResize = true"
                @touchstart.passive="listenForResize = true"
                @mouseup.document="listenForResize = false"
                @touchend.document.passive="listenForResize = false"
                @mousemove.document="drag($event)"
                @touchmove.document="drag($event)"
            ></div>

            <ul
                class="flex items-center bg-gray-100 overflow-hidden"
                data-admin-bar-tabs
            >
                @foreach ($tabs as $tab)
                    <li
                        wire:click="changeTab('{{ $tab->key() }}')"
                        @class([
                            'py-1.5 px-3 font-medium text-gray-500 hover:text-gray-800 cursor-pointer select-none',
                            'active bg-white rounded-t-2xl text-teal-600 hover:text-teal-600' => $tab->key() === $current
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
                    <div
                        wire:ignore
                        class="p-4 overflow-y-auto"
                        :style="{ height: adminBarHeight }"
                    >
                        {{ $tab->render() }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
