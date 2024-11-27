<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tutor_id',
        'tutee_id',
        'expertise',
        'timeslot',

    ];

    /**
     * Get the tutor associated with the tuition request.
     */
    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    /**
     * Get the tutee associated with the tuition request.
     */
    public function tutee()
    {
        return $this->belongsTo(User::class, 'tutee_id');
    }
}
