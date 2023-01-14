<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_id',
        'room_id',
        'start_time',
        'end_time',
        'group_id',
        'name',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
