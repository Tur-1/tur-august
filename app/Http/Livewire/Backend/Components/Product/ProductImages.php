<?php

namespace App\Http\Livewire\Backend\Components\Product;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProductImages extends Component
{
    use WithFileUploads;
    public $productImages = [];

    public function updated($key, $value)
    {
        $index = preg_replace('/[^0-9]/', '', $key); // return image index

        $this->productImages[intval($index)]['image_url'] = $value->temporaryUrl();
    }

    public function mount($productImages = null)
    {

        if (!is_null($productImages)) {
            $this->productImages = $productImages;
        } else {
            $this->productImages[] = ['id' => null, 'product_id'  => null, 'image_url' => asset('assets/images/defult-input-image.png'), 'is_main_image' => "true"];
        }
    }
    public function addNewImage()
    {
        $this->productImages[] = ['id' => null, 'product_id'  => null, 'image_url' => asset('assets/images/defult-input-image.png'), 'is_main_image' => "false"];
    }
    public function changeMainImage($index = null, $product_id = null)
    {
        if ($this->productImages[$index]['is_main_image'] == true) return;

        foreach ($this->productImages as $key => $value) {

            $this->productImages[$key]['is_main_image'] = false;
        }
        $this->productImages[$index]['is_main_image'] = true;
    }
    public function render()
    {
        return view('livewire.backend.components.product.product-images');
    }
}