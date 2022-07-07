<?php

namespace App\Http\Livewire\Backend\Components;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class ActiveToggleSwitch extends Component
{

    public Model $model;
    public string $field;
    public $is_active;

    public function mount()
    {
        $this->is_active = (bool) $this->model->getAttribute($this->field);
    }
    public function updating($field, $value)
    {

        $this->model->setAttribute($this->field, $value)->save();
    }

    public function render()
    {
        return view('livewire.backend.components.active-toggle-switch');
    }
}