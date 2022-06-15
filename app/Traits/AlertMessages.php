<?php

namespace App\Traits;


trait AlertMessages
{

    public function showSuccessMessage($message)
    {
        $this->dispatchBrowserEvent('showMessage', ['alertMessage' => $message, 'backgroundAlertMessage' => "bg-alert-success"]);
    }

    public function showErrorMessage($message)
    {
        $this->dispatchBrowserEvent('showMessage', ['alertMessage' => $message, 'backgroundAlertMessage' => "bg-alert-error"]);
    }
    public function RedirectWithSuccessMsg($routeName, $message)
    {
        return redirect()->route($routeName)->with(['alertMessage' => $message, 'backgroundAlertMessage' => "bg-alert-success"]);
    }
    public function RedirectToUrlWithSuccessMsg($url, $message)
    {
        return redirect()->to($url)->with(['alertMessage' => $message, 'backgroundAlertMessage' => "bg-alert-success"]);
    }
    public function RedirectBackWithErrorMsg($message)
    {
        return redirect()->back()->with(['alertMessage' => $message, 'backgroundAlertMessage' => "bg-alert-error"]);
    }
    public function RedirectBackWithSuccessMsg($message)
    {
        return redirect()->back()->with(['alertMessage' => $message, 'backgroundAlertMessage' => "bg-alert-success"]);
    }
}