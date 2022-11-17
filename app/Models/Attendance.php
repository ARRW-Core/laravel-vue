<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attendance extends Model
{
    use HasFactory;

    public function attendanceType() : HasMany {
        return $this->hasMany(AttendanceType::class);
    }

    public function employee() : BelongsToMany {
        return $this->belongsToMany(Employee::class);
    }

    public function dutyTime() : HasMany {
        return $this->hasMany(DutyTime::class);
    }
}
