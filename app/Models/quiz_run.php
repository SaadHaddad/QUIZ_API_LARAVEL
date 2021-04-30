<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quiz_run extends Model
{
    use HasFactory;
    protected $table="quiz_run";
    protected $fillable = [
        'id',
        'start'
    ];
}
