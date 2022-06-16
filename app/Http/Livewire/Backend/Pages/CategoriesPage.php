<?php

namespace App\Http\Livewire\Backend\Pages;

use Livewire\Component;

class CategoriesPage extends Component
{
    public $selectedSection;
    public $categories = [];
    public $sections = [];
    public $sectioName;

    public function updatedSelectedSection()
    {
        if (!is_null($this->selectedSection)) {
            $section = app('allCategories')->where("id", $this->selectedSection)->first();
            $this->categories = $section['children'] ?? [];
            $this->sectioName = $section['name'];
        }
    }


    public function mount()
    {
        $this->sections = app('allCategories')->where("is_section", true)->toArray();
    }
    public function render()
    {

        return view('livewire.backend.pages.categories-page');
    }
}