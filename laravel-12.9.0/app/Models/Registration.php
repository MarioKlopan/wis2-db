<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registration';

    public $incrementing = false;

    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'id_term',
        'points_earned',
    ];
}
