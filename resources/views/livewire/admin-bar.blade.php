<div class="fixed right-0 bottom-0 left-0">
    <div class="rounded-t-lg border border-gray-300">
        <ul class="flex items-center rounded-t-lg  bg-gray-100 overflow-hidden">
            @foreach ($tabs as $tab)
                <li
                    @class([
                        'py-3 px-4 text-sm font-medium text-gray-500 hover:text-gray-800 cursor-pointer',
                        'active bg-white text-primary-600 hover:text-primary-600' => $tab->key() === $current
                    ])
                    wire:click="changeTab('{{ $tab->key() }}')"
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
