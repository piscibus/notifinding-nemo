<?php

namespace Piscibus\Notifier\Collections;

use Exception;
use Illuminate\Database\Eloquent\Collection as ModelCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class FireNemoCollection extends Collection
{
    public $priority;
    public $users;
    public $notification;
    public $data;


    public function priority(string $priority = '')
    {
        $this->priority = $priority;

        return $this;
    }

    public function users(Object $users)
    {
        if ($users instanceof Model) {
            $this->handleOneUser($users);
        } elseif ($users instanceof ModelCollection) {
            $this->handelMultipleUser($users);
        } else {
            throw new Exception('User(s) Type not accepted');
        }

        return $this;
    }

    private function handleOneUser($user)
    {
        $this->users = $user->firePushTokens();
    }

    private function handelMultipleUser($users)
    {
        foreach ($users as $user) {
            $this->handleOneUser($user);
        }
    }

    public function title(string $title)
    {
        $this->notification['title'] = $title;

        return $this;
    }

    public function body(string $body)
    {
        $this->notification['body'] = $body;

        return $this;
    }

    public function data($data = null)
    {
        $this->data = $data;

        return $this;
    }
}
