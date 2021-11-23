<?php

use Carbon\Carbon;

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

function formattedText($value)
{
    
}
