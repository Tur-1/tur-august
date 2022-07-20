<?php

namespace App\Http\Livewire\Backend\Pages;

use Livewire\Component;
use App\Models\product\Category;
use Illuminate\Support\Facades\Session;

class CategoriesPage extends Component
{
    public $selectedSection = null;
    public $allcategories = [];
    public $categories = [];
    public $sections = [];
    public $categoriesSection = [];
    public $sectioName;


    public function updatedSelectedSection()
    {
        Session::put('selectedSection', $this->selectedSection);
        if (!empty($this->selectedSection) || !is_null($this->selectedSection)) {
            $this->categoriesSection =  Category::tree()->where("id", $this->selectedSection)->first() ?? [];

            $this->categories = $this->categoriesSection['children'] ?? [];
            $this->sectioName = $this->categoriesSection['name'] ?? [];
        }
    }


    public function mount()
    {

        $this->allcategories = Category::tree();

        if (!empty(Session::get('selectedSection'))) {

            $this->selectedSection = Session::get('selectedSection');
            $this->categoriesSection = $this->allcategories->where("id", $this->selectedSection)->first() ?? [];

            $this->categories = $this->categoriesSection['children'] ?? [];
            $this->sectioName = $this->categoriesSection['name'] ?? [];
        }
        $this->sections = $this->allcategories->where("is_section", true)->toArray();
    }
    public function render()
    {

        return view('livewire.backend.pages.categories-page');
    }
}