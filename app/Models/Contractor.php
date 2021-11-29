<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    use HasFactory;

    protected $connection = 'kypas';

    protected $table = 'contractor';

    protected $primaryKey = 'id_contractor';

    protected $guarded = [''];
}
