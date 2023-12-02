<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'completed' => 'boolean',
        'due_date' => 'datetime:Y-m-d',
    ];
}
