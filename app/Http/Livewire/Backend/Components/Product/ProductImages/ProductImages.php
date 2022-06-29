<?php

namespace App\Http\Livewire\Backend\Components\Product\ProductImages;

use App\Services\Backend\Product\ProductImageService;
use App\Traits\RedirectWithMessageTrait;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductImages extends Component
{
    use WithFileUploads, RedirectWithMessageTrait;
    public $showConfirmModal = false;
    public $productImages = [];
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

        $this->productImages = $this->productImageService->getProductImages($this->productId);
    }
    public function addNewImage()
    {
        $this->productImages[] = $this->productImageService->productImage();
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
        unset($this->productImages[$this->imageIndex]);
        // Re-index the array elements
        $this->productImages = array_values($this->productImages);

        $message = 'product image has been Deleted successfuly !';
        $this->showSuccessMessage($message);
    }
    public function closeDeleteProductImageModal()
    {
        $this->dispatchBrowserEvent('closeDeleteProductImageModal');
        $this->showConfirmModal = false;
    }
    public function updatedProductImages($image, $index)
    {
        $this->productImages[intval($index)]['image_url'] = $image->temporaryUrl();
    }
    public function changeMainImage($index, $imageId = null)
    {

        foreach ($this->productImages as $key => $value) {

            $this->productImages[$key]['is_main_image'] = false;
        }

        $this->productImageService->changeMainImage($imageId, $this->productId);

        $this->productImages[$index]['is_main_image'] = true;
    }
    public function render()
    {
        return view('livewire.backend.components.product.product-images.product-images');
    }
}