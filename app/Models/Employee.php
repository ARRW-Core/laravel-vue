<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    public function rank() : HasMany {
        return $this->hasMany(Rank::class);
    }

    public function department() : HasMany {
        return $this->hasMany(Rank::class);
    }

    public function attendance() : BelongsToMany {
        return $this->belongsToMany(Attendance::class);
    }
}
