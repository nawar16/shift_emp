<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'value'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    
    public function workerShifts(){
        return $this->hasMany(WorkerShift::class);
    }
}
