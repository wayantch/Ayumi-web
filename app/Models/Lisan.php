<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lisan extends Model
{
    use HasFactory;

    protected $table = 'lisans';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'reason',
        'date',
    ];
}
