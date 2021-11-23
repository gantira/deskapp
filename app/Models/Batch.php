<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'perihal',
        'formatted_subject',
        'formatted_body',
    ];

    protected $withCount = ['messages'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
