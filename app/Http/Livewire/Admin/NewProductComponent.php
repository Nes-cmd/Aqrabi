<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class NewProductComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.new-product-component')
                        ->layout('layouts.admin.app');
    }
}
