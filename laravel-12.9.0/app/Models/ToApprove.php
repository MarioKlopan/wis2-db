<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToApprove extends Model
{
    //
    // Name of the table
    protected $table = 'to_approve';

    protected $primaryKey = 'id_approve';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'shortcut'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

}
