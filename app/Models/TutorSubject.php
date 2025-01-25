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
        'material_link',
    ];

    public function subject_detail()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    public function assessment()
    {
        return $this->hasOne(TuitionAssessment::class, 'id', 'assessment_id');
    }
}
