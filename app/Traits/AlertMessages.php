<?php

namespace App\Traits;


trait AlertMessages
{

    public function showSuccessMessage($message)
    {
        $this->dispatchBrowserEvent('showMessage', ['flashMessage' => $message, 'background' => "bg-alert-success"]);
    }

    public function showErrorMessage($message)
    {
        $this->dispatchBrowserEvent('showMessage', ['flashMessage' => $message, 'background' => "bg-alert-error"]);
    }
    public function RedirectWithSuccessMsg($RouteName, $message)
    {
        return redirect()->route($RouteName)->with('flashMessage', $message);
    }
    public function RedirectToUrlWithSuccessMsg($url, $message)
    {
        return redirect()->to($url)->with(['flashMessage' => $message, 'backgroundFlashMessage' => "bg-primary"]);
    }
    public function RedirectBackWithErrorMsg($message)
    {
        return redirect()->back()->with(['flashMessage' => $message, 'backgroundFlashMessage' => "bg-alert-error"]);
    }
    public function RedirectBackWithSuccessMsg($message)
    {
        return redirect()->back()->with(['flashMessage' => $message, 'backgroundFlashMessage' => "bg-primary"]);
    }
}