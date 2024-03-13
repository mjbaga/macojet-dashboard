<?php

namespace App\Presenters;

trait Personable
{
    public function getFullnameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}