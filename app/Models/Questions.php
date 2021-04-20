<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $table="question";
    protected $fillable = [
        'id_q',
        'Question',
        'score',
        'A1',
        'A2',
        'A3',
        'correct'
    ];

}
