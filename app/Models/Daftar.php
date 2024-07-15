<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;

    protected $table = 'daftars';
    public $timestamps = true;

    protected $fillable = [
        'full_name', 'place_of_birth', 'date_of_birth', 'address', 'gender', 
        'phone_number', 'status', 'company_name', 'company_phone', 'email', 
        'class', 'day_time', 'file', 'created_at', 'updated_at'
    ];
}


