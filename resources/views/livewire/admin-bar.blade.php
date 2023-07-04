<div style="background-color: aliceblue">
    <ul>
        @foreach ($tabs as $tab)
            <li
                @class(['active' => $tab->key() === $current])
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
            {{ $tab->render() }}
        </div>
    @endforeach
</div>
