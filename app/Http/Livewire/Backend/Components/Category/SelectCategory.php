<?php

namespace App\Http\Livewire\Backend\Components\Category;

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


    public function mount($sectionChildren = null)
    {

        if (!is_null($sectionChildren)) {
            $this->selectedSection = $sectionChildren['selectedSection'];
            $this->categories = $sectionChildren['sectionChildren'];
            $this->selectedCategory = $sectionChildren['selectedCategory'];
        }

        $this->sections = app('allCategories')->where("is_section", true)->toArray();
        $this->getOldValues();
    }
    public function getOldValues()
    {
        if (old('section_id')) {
            $this->selectedSection = old('section_id');
            $this->categories = app('allCategories')->where("id", $this->selectedSection)->first()['children'];
        }
        if (old('category_id')) {
            $this->selectedCategory = old('category_id');
        }
    }
    public function render()
    {
        return view('livewire.backend.components.category.select-category');
    }
}