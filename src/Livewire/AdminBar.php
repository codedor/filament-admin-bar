<?php

namespace Codedor\FilamentAdminBar\Livewire;

use Codedor\FilamentAdminBar\Tabs\Tab;
use Filament\Facades\Filament;
use Livewire\Component;

class AdminBar extends Component
{
    public ?string $current = null;

    public function render()
    {
        if (! Filament::auth()->check()) {
            return '<div></div>';
        }

        $tabs = collect(config('filament-admin-bar.tabs', []))
            ->map(fn (string $tab) => new $tab())
            ->filter(fn (Tab $tab) => $tab->canSee());

        if ($tabs->isEmpty()) {
            return '';
        }

        if (! $this->current) {
            $this->current = session('filament-admin-bar.current', $tabs->first()?->key());
        }

        return view('filament-admin-bar::livewire.admin-bar', [
            'tabs' => $tabs,
            'activeTab' => $tabs->first(fn (Tab $tab) => $tab->key() === $this->current),
        ]);
    }

    public function changeTab($tab)
    {
        $this->current = $tab;
        session(['filament-admin-bar.current' => $this->current]);
    }
}
