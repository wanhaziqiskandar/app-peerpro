<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorSubject extends Model
{
    protected $table = 'tutor_subject';
    protected $fillable = [
        'tutor_id',
        'subject_id',
        'assessment_id',
    ];

    public function subject_detail()
    {
        return $this->hasOne(Subject::class, 'subject_id', 'id');
    }
    public function assessment()
    {
        return $this->hasOne(TuitionAssessment::class, 'assessment_id', 'id');
    }
}
