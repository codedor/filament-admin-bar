<?php

namespace Codedor\FilamentAdminBar\Tabs;

use Illuminate\View\View;

abstract class Tab
{
    public string $name;

    abstract public function render(): View;

    public function name()
    {
        return $this->name;
    }

    public function key()
    {
        return md5(get_class($this));
    }

    public function canSee()
    {
        return true;
    }
}
