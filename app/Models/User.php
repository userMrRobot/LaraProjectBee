<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public const ROLE_USER = 1;
    public const ROLE_ADMIN = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'telephone_number'

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

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    protected static function booted()
    {
        static::created(function ($user) {
            Bee::create([
                'user_id' => $user->id,
            ]);

        });

        static::created(function ($user) {
            Money::create([
                'user_id' => $user->id,
            ]);

        });

        static::created(function ($user) {
            Date::create([
                'user_id' => $user->id,
            ]);

        });
    }

    public function bee()
    {
        return $this->hasOne(Bee::class);
    }

    public function money()
    {
        return $this->hasOne(Money::class);
    }

    public function date()
    {
        return $this->hasOne(Date::class);
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sendEmailVerificationNotification()
    {
       $this->notify(new SendVerifyWithQueueNotification());
    }
}
