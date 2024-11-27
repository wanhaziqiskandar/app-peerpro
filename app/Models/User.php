<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'gender',
        'age',
        'email',
        'email_verified_at',
        'phone_number',
        'password',
        'role',
        'experience',
        'expertise',
        'account_number',
        'qualifications',
        'price_rate',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // tutor receives 
    public function receivedTuitionRequests()
    {
        return $this->hasMany(TuitionRequest::class, 'tutor_id');
    }

    // tutee sends
    public function sentTuitionRequests()
    {
        return $this->hasMany(TuitionRequest::class, 'tutee_id');
    }
}
