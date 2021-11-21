<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailMessage extends Model
{
    use HasFactory;

    const FLAG_ANSWERED = 'Answered';
    const FLAG_FLAGGED = 'Flagged';
    const FLAG_SEEn = 'Seen';
    const FLAG_DRAFT = 'Draft';

    protected $fillable = [
        'batch_id',
        'name',
        'nik',
        'email',
        'password',
        'flag_id',
    ];

    public function flag()
    {
        return $this->belongsTo(Flag::class);
    }
}
