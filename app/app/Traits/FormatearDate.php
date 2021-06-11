<?php
namespace App\Traits;



trait FormatearDate
{
    public static function formatDate($date){
        return __(strftime("%A", $date->getTimestamp())).
        ' '.
        strftime("%d", $date->getTimestamp()).
        ' de '.
        __(strftime("%B", $date->getTimestamp())).
        ' de '.
        strftime("%Y", $date->getTimestamp());
    }
}
