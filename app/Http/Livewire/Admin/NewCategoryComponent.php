<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

class NewCategoryComponent extends Component
{
    use WithFileUploads;
    public $category = [];
    public function saveRecords()
    {
        dd('ok');
    }
    public function render()
    {
        return view('livewire..admin.new-category-component')
                        ->layout('layouts.admin.app');
    }
}
