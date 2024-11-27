<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionAnswer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'assessment_id',
        'answer',
    ];

    /**
     * Get the tuition assessment that owns the answer.
     */
    public function assessment()
    {
        return $this->belongsTo(TuitionAssessment::class, 'assessment_id');
    }
}
