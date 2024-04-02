<?php

namespace App\Presenters;

use \Carbon\Carbon;

trait Personable
{
    public function getFullnameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getFormattedDateOfBirthAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->date_of_birth)->toFormattedDateString();
    }
}