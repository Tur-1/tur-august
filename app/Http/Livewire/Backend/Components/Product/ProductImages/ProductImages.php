<?php

namespace App\Http\Livewire\Backend\Components\Product\ProductImages;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\RedirectWithMessageTrait;
use App\Modules\Backend\Products\Services\ProductImageService;

class ProductImages extends Component
{
    use WithFileUploads, RedirectWithMessageTrait;
    public $showConfirmModal = false;
    public $images = [];
    public $productId;
    public $imageIndex;
    public $imageId;

    protected $productImageService;

    public function __construct()
    {
        $this->productImageService = new ProductImageService();
    }
    public function mount()
    {

        $this->images =  $this->productImageService->getProductImages($this->productId);
    }
    public function addNewImage()
    {
        $this->images[] = $this->productImageService->productImage();
    }
    public function openDeleteProductImageModal($imageIndex, $imageId = null)
    {
        $this->showConfirmModal = true;
        $this->imageId = $imageId;
        $this->imageIndex = $imageIndex;

        $this->dispatchBrowserEvent('openDeleteProductImageModal');
    }
    public function destroyProductImage()
    {

        $this->productImageService->destroyProductImage($this->imageId);

        // remove image from images array
        unset($this->images[$this->imageIndex]);
        // Re-index the array elements
        $this->images = array_values($this->images);

        $message = 'product image has been Deleted successfuly !';
        $this->showSuccessMessage($message);
    }
    public function closeDeleteProductImageModal()
    {
        $this->dispatchBrowserEvent('closeDeleteProductImageModal');
        $this->showConfirmModal = false;
    }
    public function updatedImages($image, $index)
    {

        $this->images[intval($index)]['image_url'] = $image->temporaryUrl();
    }
    public function changeMainImage($index, $imageId = null)
    {

        foreach ($this->images as $key => $value) {

            $this->images[$key]['is_main_image'] = false;
        }

        $this->productImageService->changeMainImage($imageId, $this->productId);

        $this->images[$index]['is_main_image'] = true;
    }
    public function render()
    {
        return view('livewire.backend.components.product.product-images.product-images');
    }
}