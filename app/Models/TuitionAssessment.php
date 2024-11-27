<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionAssessment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tutor_id',
        'request_id',
        'expertise',
    ];

    protected function casts(): array
    {
        return [
            'questions' => 'json',

        ];
    }

    /**
     * Get the tutor associated with the tuition assessment.
     */
    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    /**
     * Get the tuition request associated with the assessment.
     */
    public function tuitionRequest()
    {
        return $this->belongsTo(TuitionRequest::class, 'request_id');
    }
}
