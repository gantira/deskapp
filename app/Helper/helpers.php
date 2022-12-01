<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

function formattedDate($value)
{
    $date = Carbon::parse($value);

    if ($date->isToday()) {
        echo "Today {$date->format('H:i')}";
    } else if ($date->isCurrentWeek()) {
        echo "{$date->format('D H:i')}";
    } else {
        echo $date->format('d F Y H:i');
    }
}

function formattedText($string, $row)
{
    $data = Str::replace('[nik]', $row[0], $string);
    $data = Str::replace('[name]', $row[1], $data);
    $data = Str::replace('[email]', $row[2], $data);
    $data = Str::replace('[password]', $row[3], $data);

    return $data;
}
