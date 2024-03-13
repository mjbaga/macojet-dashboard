<?php

namespace App\Presenters;

trait BoarderPresenter
{
    public function getFullnameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}