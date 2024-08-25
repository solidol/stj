<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Library\CalendarHelper;

class Shedule extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'kod_prep');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function getDwAttribute()
    {
        return CalendarHelper::$daysofweek[$this->day_of_week];
    }
    public function getWtAttribute()
    {
        if ($this->week_a == $this->week_b)
            return "Ч/З";
        if ($this->week_a == 1)
            return "Ч/-";
        if ($this->week_b == 1)
            return "-/З";
    }
}
