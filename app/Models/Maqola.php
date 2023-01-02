<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maqola extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'nashriyot',
        'user_id',
        'sana',
    ];
}
