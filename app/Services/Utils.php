<?php 

namespace App\Services;

use Carbon\Carbon;
use ReflectionClass;

class Utils {
    public static function dateToStringFormat($date, $format = 'Y-m-d')
    {
        return Carbon::createFromFormat($format, $date)->toFormattedDateString();
    }

    public static function getClassName($classString) {
        return (new ReflectionClass($classString))->getShortName();
    }
}