<?php

namespace App\Traits;


trait AlertMessages
{

    public function showSuccessMessage($message)
    {
        //  for livewire
        $this->dispatchBrowserEvent('showMessage', ['alertMessage' => $message, 'backgroundAlertMessage' => "bg-alert-success"]);
    }

    public function showErrorMessage($message)
    {
        //  for livewire
        $this->dispatchBrowserEvent('showMessage', ['alertMessage' => $message, 'backgroundAlertMessage' => "bg-alert-error"]);
    }
    public function redirectWithSuccessMsg($routeName, $message)
    {
        return redirect()->route($routeName)->with(['alertMessage' => $message, 'backgroundAlertMessage' => "bg-alert-success"]);
    }
    public function redirectToUrlWithSuccessMsg($url, $message)
    {
        return redirect()->to($url)->with(['alertMessage' => $message, 'backgroundAlertMessage' => "bg-alert-success"]);
    }
    public function redirectBackWithErrorMsg($message)
    {
        return redirect()->back()->with(['alertMessage' => $message, 'backgroundAlertMessage' => "bg-alert-error"]);
    }
    public function redirectBackWithSuccessMsg($message)
    {
        return redirect()->back()->with(['alertMessage' => $message, 'backgroundAlertMessage' => "bg-alert-success"]);
    }
}