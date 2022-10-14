<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerShift extends Model
{
    use HasFactory;
    protected $table = "workers_shifts";

    protected $fillable = [
        'worker_id',
        'shift_id',
        'shift_day'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function shifts(){
        return $this->belongsTo(Shift::class, "shift_id");
    }

    public function worker(){
        return $this->belongsTo(Worker::class , "worker_id");
    }
}
