<?php

namespace App\Http\Livewire\Backend\Components\Product;

use Livewire\Component;
use App\Traits\RedirectWithMessageTrait;
use App\Models\product\SizeOption;
use App\Models\product\ProductSizeOption;

class ProductSizeOptions extends Component
{
    use RedirectWithMessageTrait;
    public $showModal;
    public $inputFields = [];
    public $indexInput;
    public $inputId;

    protected $rules = [
        'inputFields.*.size_id' => 'sometimes|required|distinct',
        'inputFields.*.stock' => 'sometimes|required|numeric',

    ];

    protected $messages = [
        'inputFields.*.size_id.required' => 'The Size field can\'t be Empty',
        'inputFields.*.size_id.distinct' => 'The Size field has a duplicate value',
        'inputFields.*.stock.numeric' => 'The stock field must be a number',
        'inputFields.*.stock.required' => 'The stock field can\'t be Empty',
    ];
    public function updatedInputFields()
    {
        $this->validate();
    }
    public function mount($productSizeOptions = null)
    {

        $this->inputFields[] = ['id' => null, 'size_id' => null, 'stock'  => null];
        if (!is_null($productSizeOptions)) {
            $this->inputFields = $productSizeOptions->toArray();
        }
    }
    public function addNewInput()
    {
        $this->inputFields[] = ['id' => null, 'size_id' => null, 'stock'  => null];
    }
    public function openDeleteSizeModal($index,  $inputId = null)
    {

        $this->showModal = true;
        $this->indexInput = $index;
        $this->inputId =  $inputId;

        $this->dispatchBrowserEvent('openDeleteSizeModal');
    }
    public function destroySizeOption()
    {
        if (!is_null($this->inputId)) {
            ProductSizeOption::where('id', $this->inputId)->delete();
        }
        unset($this->inputFields[$this->indexInput]);

        // Re-index the array elements
        $this->inputFields = array_values($this->inputFields);

        $message = 'size has been Deleted successfuly !';
        $this->showSuccessMessage($message);
        $this->closeDeleteSizeModal();
    }
    public function closeDeleteSizeModal()
    {
        $this->dispatchBrowserEvent('closeDeleteSizeModal');
        $this->showModal = false;
    }
    public function render()
    {
        $size_options = SizeOption::pluck('name', 'id');


        return view('livewire.backend.components.product.product-size-options', compact('size_options'));
    }
}
