<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    use HasFactory;
    protected $table = "timezone";

    protected $fillable = [
        'title',
        'utc_offset'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
