<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vi extends Model
{
    use HasFactory;
    protected $connection = 'mysql_vi';

    protected $table = 'vi';

    protected $fillable = [
        'plafond',
        'active'
    ];
}
