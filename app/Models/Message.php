<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_id',
        'name',
        'nik',
        'email',
        'password',
        'subject',
        'body',
        'flag_id',
    ];

    protected $appends = ['flag_name'];

    public function getFlagNameAttribute()
    {
        return [
            1 => "Answered",
            2 => "Flagged",
            3 => "Deleted",
            4 => "Seen",
            5 => "Draft",
            6 => "Sent",
            7 => "Failure",
        ][$this->attributes['flag_id']];
    }
}
