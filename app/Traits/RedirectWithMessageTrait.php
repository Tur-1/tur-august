<?php

namespace App\Traits;


trait RedirectWithMessageTrait
{

    public function showSuccessMessage($message)
    {
        //  for livewire
        $this->dispatchBrowserEvent('showMessage', $this->toastMessage($message, "bg-alert-success"));
    }

    public function showErrorMessage($message)
    {
        //  for livewire
        $this->dispatchBrowserEvent('showMessage', $this->toastMessage($message, "bg-alert-danger"));
    }
    public function redirectWithSuccessMsg($routeName, string $message)
    {
        return redirect()->route($routeName)->with($this->toastMessage($message, "bg-alert-success"));
    }
    public function redirectBackWithSuccessMsg(string $message)
    {
        return redirect()->back()->with($this->toastMessage($message, "bg-alert-success"));
    }

    public function redirectToUrlWithSuccessMsg($url, $message)
    {
        return redirect()->to($url)->with($this->toastMessage($message, "bg-alert-success"));
    }

    public function redirectBackWithErrorMsg(string $message)
    {
        return redirect()->back()->with($this->toastMessage($message, "bg-alert-danger"));
    }
    private function toastMessage(string $message, string $bakground)
    {
        return [
            'toast' => [
                'message' => $message,
                'background' => $bakground
            ]
        ];
    }
}