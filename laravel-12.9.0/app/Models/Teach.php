<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teach extends Model
{
    use HasFactory;

    protected $table = 'teach';

    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'shortcut'
    ];

    public $timestamps = false;
}
