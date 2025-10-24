<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Study extends Model
{
    use HasFactory;

    // Name of the table
    protected $table = 'study';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'shortcut'
    ];

    public function studies(): HasMany
    {
        return $this->hasMany(Study::class, 'user_id');
    }
}
