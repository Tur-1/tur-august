<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithFileUploads;

class ShowTheTemporaryImage extends Component
{
    use WithFileUploads;
    public $selectedImage = null;
    public $inputName;
    public $imagePath;

    protected $rules = [
        'selectedImage' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:5000'],
    ];

    public function updatedSelectedImage()
    {
        $this->validate();
    }
    public function render()
    {
        return view('livewire.backend.show-the-temporary-image');
    }
}