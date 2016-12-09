<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

/**
 * Class UserPresenter
 * @package App\Presenters
 */
class UserPresenter extends Presenter
{
    /**
     * Return user avatar if exist or default avatar
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function avatar()
    {
        // If user have not avatar
        if (!$this->entity->avatar)
        {
            return url('/img/avatar.png');
        }

        return url(config('filesystems.disks.public.root') . "/users/" . $this->entity->avatar);
    }

    /**
     * Return user full name (first name + last name)
     *
     * @return string
     */
    public function fullName()
    {
        return $this->entity->first_name . ' ' . $this->entity->last_name;
    }
}