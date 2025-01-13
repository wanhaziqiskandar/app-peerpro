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
        'date',
        'status',
        'score',
        'answers',
        'timeslot',

    ];

    protected $casts = [
        'answers' => 'json',
    ];

    public function getSessionAttribute()
    {
        switch ($this->timeslot) {
            case ('morning'):
                return '9:00am - 12:00pm';
            case ('afternoon'):
                return '1:00pm - 4:00pm';
            case ('evening'):
                return '6:00pm - 9:00pm';
        }
    }

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

    public function payment()
    {
        return $this->hasOne(TuitionPayment::class, 'request_id', 'id')->latest();
    }

    public function tuitionAssessment()
    {
        return $this->belongsTo(TuitionAssessment::class);
    }

}
