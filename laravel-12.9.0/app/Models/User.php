<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'user_id';

    public $incrementing = false;

    protected $keyType = 'int';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'description',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function teaches(): HasMany
    {
        return $this->hasMany(Teach::class, 'user_id');
    }

    public function studies(): HasMany
    {
        return $this->hasMany(Study::class, 'user_id');
    }

    public function guarantees(): HasMany
    {
        return $this->hasMany(Course::class, 'user_id');
    }

    public function terms()
    {
        return $this->hasManyThrough(
            Term::class,
            Registration::class,
            'user_id',     // Foreign key on registration table
            'id_term',     // Foreign key on term table
            'user_id',     // Local key on user table
            'id_term'      // Local key on registration table
        );
    }

    public function reg_courses()
    {
        return $this->hasManyThrough(
            Course::class,
            Study::class,
            'user_id',     // Foreign key on registration table
            'shortcut',     // Foreign key on term table
            'user_id',     // Local key on user table
            'shortcut'      // Local key on registration table
        );
    }

    public function teach_courses()
    {
        return $this->hasManyThrough(
            Course::class,
            Teach::class,
            'user_id',     // Foreign key on registration table
            'shortcut',     // Foreign key on term table
            'user_id',     // Local key on user table
            'shortcut'      // Local key on registration table
        );
    }

    public function garant_courses()
    {
        return $this->hasMany(Course::class, 'user_id');
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
