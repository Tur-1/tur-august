<?php

namespace App\Http\Livewire\Backend\Pages;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CategoriesPage extends Component
{
    public $selectedSection = null;
    public $categories = [];
    public $sections = [];
    public $categoriesSection = [];
    public $sectioName;

    public function updatedSelectedSection()
    {
        Session::put('selectedSection', $this->selectedSection);
        if (!empty($this->selectedSection) || !is_null($this->selectedSection)) {
            $this->categoriesSection = app('allCategories')->where("id", $this->selectedSection)->first() ?? [];

            $this->categories = $this->categoriesSection['children'] ?? [];
            $this->sectioName = $this->categoriesSection['name'] ?? [];
        }
    }


    public function mount()
    {

        if (Session::has('selectedSection')) {
            $this->selectedSection = Session::get('selectedSection');
            $this->categoriesSection = app('allCategories')->where("id", $this->selectedSection)->first() ?? [];

            $this->categories = $this->categoriesSection['children'] ?? [];
            $this->sectioName = $this->categoriesSection['name'] ?? [];
        }


        $this->sections = app('allCategories')->where("is_section", true)->toArray();
    }
    public function render()
    {

        return view('livewire.backend.pages.categories-page');
    }
}