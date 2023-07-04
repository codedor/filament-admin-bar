<?php

namespace Codedor\FilamentAdminBar\Http\Livewire;

use Codedor\FilamentAdminBar\Tabs\Tab;
use Livewire\Component;

class AdminBar extends Component
{
    public null|string $current = null;

    public function render()
    {
        $tabs = collect(config('filament-admin-bar.tabs', []))
            ->map(fn (string $tab) => new $tab())
            ->filter(fn (Tab $tab) => $tab->canSee());

        if (! $this->current) {
            $this->current = session('filament-admin-bar.current', $tabs->first()?->key());
        }

        return view('filament-admin-bar::livewire.admin-bar', [
            'tabs' => $tabs,
            'activeTab' => $tabs->firstWhere(fn (Tab $tab) => $tab->key() === $this->current),
        ]);
    }

    public function changeTab($tab)
    {
        $this->current = $tab;
        session(['filament-admin-bar.current' => $this->current]);
    }
}
