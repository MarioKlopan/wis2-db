<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $table = 'term';

    protected $primaryKey = 'id_term';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'type',
        'description',
        'max_points',
        'date',
        'shortcut'
    ];

    public $timestamps = false;

    protected $casts = [
        'date' => 'datetime',
    ];
}
