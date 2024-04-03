<?php 

namespace App\Services;

use Carbon\Carbon;

class Utils {
    public static function dateToStringFormat($date, $format = 'Y-m-d')
    {
        return Carbon::createFromFormat($format, $date)->toFormattedDateString();
    }
}