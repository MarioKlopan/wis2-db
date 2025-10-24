<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Takes_place extends Model
{
    protected $table = 'takes_place';

    protected $primaryKey = 'my_row_id';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'id_room',
        'id_term'
    ];
}
