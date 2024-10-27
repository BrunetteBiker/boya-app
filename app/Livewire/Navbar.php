<?php

namespace App\Livewire;

use Livewire\Attributes\Lazy;
use Livewire\Component;

class Navbar extends Component
{
    public $currentUrl;

    function placeholder()
    {
        return <<<'HTML'
        <div class="opacity-0">

        </div>
        HTML;
    }
    public function render()
    {
        return view('livewire.navbar');
    }
}
