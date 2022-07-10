<?php

namespace App\Models\user\Observers;

use App\Mail\WelcomeMail;
use App\Models\user\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\user\User  $user
     * @return void
     */
    public function created(User $user)
    {
        Mail::to($user->email)->send(new WelcomeMail($user->name));
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\user\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\user\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\user\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\user\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}