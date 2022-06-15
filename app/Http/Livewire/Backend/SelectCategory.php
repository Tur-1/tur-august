<?php

namespace App\Http\Livewire\Backend;

use App\Models\product\Category;
use Livewire\Component;

class SelectCategory extends Component
{
    public $selectedCategory;
    public $selectedSection;
    public $categories = [];
    public $sections = [];


    public function updatedSelectedSection()
    {
        $this->categories = app('allCategories')->where("id", $this->selectedSection)->first()['children'];
    }



    public function mount()
    {
        $this->sections = app('allCategories')->where("is_section", true)->toArray();
    }
    public function render()
    {
        return view('livewire.backend.select-category');
    }
}