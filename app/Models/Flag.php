<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Flag extends Model
{
    use HasFactory, Sushi;

    protected $rows = [
        ['id' => 1, 'name' => 'Answered'],
        ['id' => 2, 'name' => 'Flagged'],
        ['id' => 3, 'name' => 'Deleted'],
        ['id' => 4, 'name' => 'Seen'],
        ['id' => 5, 'name' => 'Draft'],
    ];

    protected function sushiShouldCache()
    {
        return true;
    }
}
