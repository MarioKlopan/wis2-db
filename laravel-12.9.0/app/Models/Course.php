<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Term;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';

    protected $primaryKey = 'shortcut';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'shortcut',
        'type',
        'price',
        'description',
        'user_id'
    ];

    public $timestamps = false;

    public function terms()
    {
        return $this->hasMany(Term::class, 'shortcut', 'shortcut');
    }
}
