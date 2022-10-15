<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'timezone_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function workerShifts(){
        return $this->hasMany(WorkerShift::class);
    }

    public function timezone(){
        return $this->belongsTo(Timezone::class);
    }
}
